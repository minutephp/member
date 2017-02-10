<?php
/**
 * Created by: MinutePHP framework
 */
namespace App\Controller\Members {

    use Illuminate\Support\Str;
    use Minute\Config\Config;
    use Minute\Error\BasicError;
    use Minute\Event\Dispatcher;
    use Minute\Event\UserSignupEvent;
    use Minute\Http\HttpResponseEx;
    use Minute\Routing\RouteEx;
    use Minute\Session\Session;
    use Minute\View\Helper;
    use Minute\View\Redirection;
    use Minute\View\View;

    class StartTrial {
        /**
         * @var Config
         */
        private $config;
        /**
         * @var Dispatcher
         */
        private $dispatcher;
        /**
         * @var Session
         */
        private $session;
        /**
         * @var HttpResponseEx
         */
        private $response;

        /**
         * StartTrial constructor.
         *
         * @param Config $config
         * @param Dispatcher $dispatcher
         * @param Session $session
         * @param HttpResponseEx $response
         */
        public function __construct(Config $config, Dispatcher $dispatcher, Session $session, HttpResponseEx $response) {
            $this->config     = $config;
            $this->dispatcher = $dispatcher;
            $this->session    = $session;
            $this->response   = $response;
        }

        public function index(string $redir = '') {
            if (!empty($redir)) {
                $this->response->setCookie('redir', $redir);
            } else {
                $redir = @$_COOKIE['redir'] ?: '/members';
            }

            if (!empty($_COOKIE[Session::COOKIE_NAME])) {
                if ($this->session->getLoggedInUserId() > 0) {
                    $this->response->redirect($redir);
                } else {
                    $this->response->redirect('/login');
                }
            } elseif ($this->config->get('private/anonymous-trial', true)) {
                $params = ['ident' => sprintf("TRIAL_%s", Str::random())];
                $event  = new UserSignupEvent($params);
                $this->dispatcher->fire(UserSignupEvent::USER_SIGNUP_BEGIN, $event);

                if ($user = $event->getUser()) {
                    $this->session->startSession($user->user_id);

                    $this->response->redirect($redir);
                }
            } else {
                $this->response->redirect('/signup');
            }

            return $this->response;
        }
    }
}
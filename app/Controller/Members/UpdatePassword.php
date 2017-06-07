<?php
/**
 * Created by: MinutePHP framework
 */

namespace App\Controller\Members {

    use App\Model\User;
    use Minute\Error\AuthError;
    use Minute\Error\UserLoginError;
    use Minute\Error\UserUpdateDataError;
    use Minute\Event\Dispatcher;
    use Minute\Event\UserLoginEvent;
    use Minute\Event\UserUpdateDataEvent;
    use Minute\Routing\RouteEx;
    use Minute\Session\Session;
    use Minute\View\Helper;
    use Minute\View\View;

    class UpdatePassword {
        /**
         * @var Dispatcher
         */
        private $dispatcher;
        /**
         * @var Session
         */
        private $session;

        /**
         * UpdatePassword constructor.
         *
         * @param Dispatcher $dispatcher
         * @param Session $session
         */
        public function __construct(Dispatcher $dispatcher, Session $session) {
            $this->dispatcher = $dispatcher;
            $this->session    = $session;
        }

        public function index(array $_params) {
            if ($user = User::find($this->session->getLoggedInUserId())) {
                $event = new UserLoginEvent(['email' => $user->email, 'password' => $_params['current'] ?? '']);
                $this->dispatcher->fire(UserLoginEvent::USER_LOGIN_AUTHENTICATE, $event);

                if ($auth = $event->getUser()) {
                    $event = new UserUpdateDataEvent($user, ['password' => $_params['password']]);
                    $this->dispatcher->fire(UserUpdateDataEvent::USER_UPDATE_DATA, $event);

                    if ($event->isHandled()) {
                        return json_encode((['update' => 'PASSWORD_RESET']));
                    } else {
                        throw new UserUpdateDataError($event->getError() ?: 'Unknown error.');
                    }
                } else {
                    throw new UserLoginError("Current password does not match.");
                }
            }

            throw new UserLoginError("Unknown error.");
        }
    }
}
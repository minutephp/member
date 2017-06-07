<?php
/**
 * Created by: MinutePHP framework
 */

namespace App\Controller\Members {

    use App\Model\User;
    use Carbon\Carbon;
    use Minute\Error\UserUpdateDataError;
    use Minute\Event\Dispatcher;
    use Minute\Event\UserAccountCancelEvent;
    use Minute\Routing\RouteEx;
    use Minute\Session\Session;
    use Minute\View\Helper;
    use Minute\View\View;

    class CancelAccount {
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

        public function index() {
            /** @var User $user */
            if ($user = User::find($this->session->getLoggedInUserId())) {
                $event = new UserAccountCancelEvent($user);
                $this->dispatcher->fire(UserAccountCancelEvent::USER_CANCEL_ACCOUNT, $event);

                if ($event->isHandled()) {
                    return 'OK';
                }
            }

            throw new UserUpdateDataError('Failed');
        }
    }
}
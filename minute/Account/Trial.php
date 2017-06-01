<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 5/31/2017
 * Time: 3:34 PM
 */

namespace Minute\Account {

    use App\Model\MUserGroup;
    use Carbon\Carbon;
    use Minute\Config\Config;
    use Minute\Event\ImportEvent;
    use Minute\Session\Session;
    use Minute\User\AccessManager;
    use Minute\User\UserInfo;

    class Trial {
        /**
         * @var Config
         */
        private $config;
        /**
         * @var Session
         */
        private $session;
        /**
         * @var UserInfo
         */
        private $userInfo;

        /**
         * Trial constructor.
         *
         * @param Config $config
         * @param Session $session
         * @param UserInfo $userInfo
         */
        public function __construct(Config $config, Session $session, UserInfo $userInfo) {
            $this->config   = $config;
            $this->session  = $session;
            $this->userInfo = $userInfo;
        }

        public function expiryNotice(ImportEvent $event) {
            if ($user_id = $this->session->getLoggedInUserId()) {
                $now = Carbon::now();

                if ($groups = $this->userInfo->getUserGroups($user_id, true)) {
                    foreach ($groups as $group) {
                        $expires_at = Carbon::parse($group->expires_at);
                        $remaining  = $now->diffInDays($expires_at);

                        $link       = $this->config->get(AccessManager::GROUP_KEY . '/upgrade_link', '/pricing');
                        $days       = $this->config->get(AccessManager::GROUP_KEY . '/upgrade_link', '/pricing');
                        $links      = [["href" => "/pricing", "tooltip" => "14 days remaining", "icon" => "fa-clock-o", "html" => "<b>30 days</b> remaining", "priority" => 1]];

                        $event->addContent($links);
                    }
                }
            }
        }
    }
}
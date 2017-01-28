<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 9/9/2016
 * Time: 1:23 PM
 */
namespace Minute\Notice {

    use App\Model\MMemberNotice;
    use Minute\Event\ImportEvent;
    use Minute\Session\Session;

    class Toolbar {
        const NOTICES_LINK = "/members/notices";
        /**
         * @var Session
         */
        private $session;

        /**
         * Toolbar constructor.
         *
         * @param Session $session
         */
        public function __construct(Session $session) {
            $this->session = $session;
        }

        public function render(ImportEvent $event) {
            if ($user_id = $this->session->getLoggedInUserId()) {
                $count = MMemberNotice::where('seen', '=', 'false')->where('user_id', '=', $user_id)->count() ?: 0;

                foreach (MMemberNotice::where('user_id', '=', $user_id)->limit(3)->orderBy('created_at', true)->get() as $notice) {
                    $children[] = ["html" => $notice->seen === 'true' ? $notice->title : "<b>$notice->title</b>", "icon" => $notice->icon,
                                   "href" => self::NOTICES_LINK . "/view/" . $notice->member_notice_id];
                }

                $links = [["href" => "/", "tooltip" => "$count new messages", "html" => "test", "icon" => "fa-bell", "priority" => 99, "header" => "Recent activity",
                           "headerLink" => self::NOTICES_LINK, "badge" => $count ?: '', "children" => $children ?? []]];

                $event->addContent($links);
            }
        }
    }
}
<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 7/8/2016
 * Time: 7:57 PM
 */
namespace Minute\Menu {

    use Minute\Event\ImportEvent;
    use Minute\Session\Session;

    class MemberMenu {
        public function adminLinks(ImportEvent $event) {
            $links = [
                'members' => ['title' => "Member's area", 'icon' => 'fa-sign-in', 'priority' => 50],
                'members-area' => ['title' => "Member's dashboard", 'icon' => 'fa-list-ul', 'priority' => 1, 'parent' => 'members', 'href' => '/admin/members'],
                'member-notices' => ['title' => "Member notices", 'icon' => 'fa-tags', 'priority' => 2, 'parent' => 'members', 'href' => '/admin/notices'],
                'member-banners' => ['title' => "Member banners", 'icon' => 'fa-comment', 'priority' => 3, 'parent' => 'members', 'href' => '/admin/members/banners'],
            ];

            $event->addContent($links);
        }

        public function memberLinks(ImportEvent $event) {
            $links = ['member-dashboard' => ['title' => "Home", 'icon' => 'fa-dashboard', 'href' => '/members', 'priority' => 1]];

            if (!empty($_COOKIE[Session::ADMIN_COOKIE_NAME])) {
                $links['member-admin'] = ['title' => "Back to admin", 'icon' => 'fa-sign-out', 'href' => '/admin/swap', 'priority' => 99];
            }

            $event->addContent($links);
        }

        public function profileTabs(ImportEvent $event) {
            $tabs = [["href" => "/members/profile", "label" => "Profile", "icon" => "fa-user", "priority" => 1]];

            $event->addContent($tabs);
        }
    }
}
<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 8/12/2016
 * Time: 5:46 PM
 */
namespace Minute\Event {

    class MemberEvent extends Event {
        const IMPORT_MEMBERS_SIDEBAR_LINKS = "import.members.sidebar.links";
        const IMPORT_MEMBERS_TOOLBAR_LINKS = "import.members.toolbar.links";
        const IMPORT_MEMBERS_PROFILE_LINKS = "import.members.profile.links";

        const IMPORT_MEMBERS_BANNER_HTML = "import.members.banner.html";

        //tabs on profile page: profile | subscriptions | etc
        const IMPORT_MEMBERS_PROFILE_TABS = "import.members.profile.tabs";

    }
}
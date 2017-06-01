<?php

/** @var Binding $binding */
use Minute\Account\Trial;
use Minute\Banner\MemberBanner;
use Minute\Event\AdminEvent;
use Minute\Event\Binding;
use Minute\Event\MemberEvent;
use Minute\Event\TodoEvent;
use Minute\Menu\MemberMenu;
use Minute\Notice\MemberNotice;
use Minute\Notice\Toolbar;
use Minute\Todo\MemberTodo;

$binding->addMultiple([
    //members
    ['event' => AdminEvent::IMPORT_ADMIN_MENU_LINKS, 'handler' => [MemberMenu::class, 'adminLinks']],
    ['event' => MemberEvent::IMPORT_MEMBERS_SIDEBAR_LINKS, 'handler' => [MemberMenu::class, 'memberLinks']],

    ['event' => MemberEvent::IMPORT_MEMBERS_TOOLBAR_LINKS, 'handler' => [Toolbar::class, 'render']],

    //
    ['event' => MemberEvent::IMPORT_MEMBERS_TOOLBAR_LINKS, 'handler' => [Trial::class, 'expiryNotice']],

    //profile tabs
    ['event' => MemberEvent::IMPORT_MEMBERS_PROFILE_TABS, 'handler' => [MemberMenu::class, 'profileTabs']],

    //callout for sales, etc
    ['event' => MemberEvent::IMPORT_MEMBERS_BANNER_HTML, 'handler' => [MemberBanner::class, 'getBanner']],

    //support - Can't use Event Constants because that creates a binding on support plugin
    ['event' => 'admin.support.reply', 'handler' => [MemberNotice::class, 'createNotice'], 'data' => 'support_ticket_reply'],
    ['event' => 'admin.support.status', 'handler' => [MemberNotice::class, 'createNotice'], 'data' => 'support_ticket_status'],

    //tasks
    ['event' => TodoEvent::IMPORT_TODO_ADMIN, 'handler' => [MemberTodo::class, 'getTodoList']],
]);
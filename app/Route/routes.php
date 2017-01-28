<?php

/** @var Router $router */
use Minute\Model\Permission;
use Minute\Routing\Router;

$router->get('/members', 'Members/SampleDashboard.php', true, 'm_configs[type] as configs')
       ->setReadPermission('configs', Permission::ANY_USER)->setDefault('type', 'members');

$router->get('/members/profile', 'Members/Profile/SampleProfilePage.php', true, 'users', 'm_user_data[users.user_id][99] as data')
       ->setReadPermission('users', Permission::SAME_USER)->setDefault('users', '*');

$router->post('/members/profile', null, true, 'users', 'm_user_data as data')
       ->setUpdatePermission('users', Permission::SAME_USER)->setAllPermissions('data', Permission::SAME_USER);

$router->get('/admin/members', null, 'admin', 'm_configs[type] as configs')
       ->setReadPermission('configs', 'admin')->setDefault('type', 'members');
$router->post('/admin/members', null, 'admin', 'm_configs as configs')
       ->setAllPermissions('configs', 'admin');

$router->get('/admin/notices', null, 'admin', 'm_notices[5] as notices')
       ->setReadPermission('notices', 'admin')->setDefault('notices', '*');
$router->post('/admin/notices', null, 'admin', 'm_notices as notices')
       ->setAllPermissions('notices', 'admin');

$router->get('/admin/notices/edit/{notice_id}', null, 'admin', 'm_notices[notice_id] as notices')
       ->setReadPermission('notices', 'admin')->setDefault('notice_id', '0');
$router->post('/admin/notices/edit/{notice_id}', null, 'admin', 'm_notices as notices')
       ->setAllPermissions('notices', 'admin')->setDefault('notice_id', '0');

$router->get('/members/notices', null, true, 'm_member_notices[5] as notices')
       ->setReadPermission('notices', Permission::SAME_USER)->setDefault('notices', '*');
$router->post('/members/notices', null, true, 'm_member_notices as notices')
       ->setAllPermissions('notices', Permission::SAME_USER);

$router->get('/members/notices/view/{member_notice_id}', null, true, 'm_member_notices[member_notice_id] as notices')
       ->setReadPermission('notices', Permission::SAME_USER);
$router->post('/members/notices/view/{member_notice_id}', null, true, 'm_member_notices as notices')
       ->setAllPermissions('notices', Permission::SAME_USER);

$router->get('/admin/members/banners', null, 'admin', 'm_member_banners[5] as banners')
       ->setReadPermission('banners', 'admin')->setDefault('banners', '*');
$router->post('/admin/members/banners', null, 'admin', 'm_member_banners as banners')
       ->setAllPermissions('banners', 'admin');

$router->get('/admin/members/banners/edit/{member_banner_id}', null, 'admin', 'm_member_banners[member_banner_id] as banners')
       ->setReadPermission('banners', 'admin')->setDefault('member_banner_id', '0');
$router->post('/admin/members/banners/edit/{member_banner_id}', null, 'admin', 'm_member_banners as banners')
       ->setAllPermissions('banners', 'admin')->setDefault('member_banner_id', '0');

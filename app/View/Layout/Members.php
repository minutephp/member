<link rel="stylesheet" href="/static/bower_components/AdminLTE/dist/css/AdminLTE.css" />
<link rel="stylesheet" href="/static/bower_components/AdminLTE/dist/css/skins/skin-blue.css" />
<link rel="stylesheet" href="/static/bower_components/angular-loading-bar/build/loading-bar.css" />
<link rel="stylesheet" href="/static/bower_components/jquery-ui/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="/static/bower_components/angular-tree-menu/src/css/angular-tree-menu.css" />

<script>var tooltip = jQuery.fn.tooltip;</script>
<script src="/static/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>jQuery.fn.tooltip = tooltip;</script>

<script src="/static/bower_components/lodash/dist/lodash.js"></script>
<script src="/static/bower_components/angular-filter/dist/angular-filter.js"></script>
<script src="/static/bower_components/AdminLTE/plugins/daterangepicker/moment.js"></script>
<script src="/static/bower_components/angular-loading-bar/build/loading-bar.js"></script>
<script src="/static/bower_components/angular-bs-tip/src/js/angular-bs-tip.js"></script>
<script src="/static/bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="/js/translations.js"></script>

<script src="/static/bower_components/minute/src/js/minute-directives.js"></script>
<script src="/static/bower_components/minute/src/js/minute-filters.js"></script>
<script src="/static/bower_components/AdminLTE/dist/js/app.min.js"></script>

<div class="wrapper">
    <div ng-controller="membersController as members" ng-init="members.init()" id="membersContainer">
        <div>
            <minute-event name="import.members.sidebar.links" as="members.data.menu"></minute-event>
            <minute-event name="import.members.toolbar.links" as="members.data.toolbar"></minute-event>

            <minute-event name="import.members.profile.links" as="members.data.profile.links"></minute-event>
            <minute-event name="import.members.profile.buttons" as="members.data.profile.buttons"></minute-event>

            <minute-event name="import.members.banner.html" as="members.data.banner"></minute-event>

            <header class="main-header">
                <a href="" ng-href="/members" class="logo">
                    <span class="logo-mini"><i class="fa fa-home"></i></span>
                    <span class="logo-lg"><b>{{session.site.site_name || 'Members'}}</b></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li ng-repeat="toolbar in members.data.toolbar | orderBy:'priority'" ng-class="{'dropdown tasks-menu': !!toolbar.children.length}" ng-switch="!!toolbar.children.length"
                                class="notifications-menu">
                                <!--simple button start-->
                                <a ng-switch-when="false" href="" ng-href="{{toolbar.href}}" tooltip="{{toolbar.tooltip}}" tooltip-position="bottom">
                                    <i class="fa {{toolbar.icon}}" ng-show="toolbar.icon"></i>
                                    <span class="label label-{{toolbar.badgeClass || 'danger'}}" ng-show="toolbar.badge">{{toolbar.badge}}</span>
                                </a>
                                <!--simple button end-->

                                <!--drop-down menu item start-->
                                <a ng-switch-when="true" href="#" class="dropdown-toggle" data-toggle="dropdown" tooltip="{{toolbar.tooltip}}" tooltip-position="bottom">
                                    <i class="fa {{toolbar.icon}}" ng-show="toolbar.icon"></i>
                                    <span class="label label-{{toolbar.badgeClass || 'danger'}}" ng-show="toolbar.badge">{{toolbar.badge}}</span>
                                </a>

                                <ul ng-switch-when="true" class="dropdown-menu">
                                    <li class="header" ng-if="toolbar.header"><a ng-href="{{toolbar.headerLink || '#'}}" ng-bind-html="toolbar.header | safe"></a></li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li ng-repeat="child in toolbar.children">
                                                <a href="" ng-href="{{child.href}}">
                                                    <i class="fa {{child.icon}}" ng-show="child.icon"></i>
                                                    <span class="text-e" ng-bind-html="child.html | safe"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer" ng-if="toolbar.footer" ng-bind-html="toolbar.footer | safe"></li>
                                </ul>
                                <!--drop-down menu item end-->
                            </li>

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img ng-src="{{session.user.photo_url || '//i.imgur.com/d9LPirr.png'}}" class="img-circle profile-pic" alt="User Image">
                                    <span class="hidden-xs" ng-show="session.user.full_name">{{session.user.full_name}}</span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img ng-src="{{session.user.photo_url || '//i.imgur.com/d9LPirr.png'}}" class="img-circle profile-pic-lg" alt="User Image">

                                        <p>
                                            {{session.user.full_name}}
                                            <small><span translate="">Joined </span> {{session.user.created_at | timeAgo}}</small>
                                        </p>
                                    </li>

                                    <li class="user-body" ng-if="!!members.data.profile.length">
                                        <div class="row">
                                            <div class="col-xs-{{12 / members.data.profile.length}} text-center" ng-repeat="(key, link) in members.data.profile | orderBy:'priority'">
                                                <a href="" ng-href="{{link.href}}">
                                                    <i class="fa fa-fw fa-{{link.icon}}" ng-show="link.icon"></i>
                                                    <span ng-bind-html="link.html | safe"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="" ng-href="/members/profile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="" ng-href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img ng-src="{{session.user.photo_url || '//i.imgur.com/d9LPirr.png'}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{session.user.first_name || 'Member'}}</p>

                            <a href="" ng-show="session.user.first_name"><span translate="">Member's area</span></a>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form ng-submit="false" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" ng-model="data.search" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">

                        <li class="header">MAIN NAVIGATION</li>

                        <angular-tree-menu items="members.data.menu" search="{{data.search}}"></angular-tree-menu>

                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
        </div>

        <div class="content-wrapper member-banner" ng-if="!!members.data.banner.name">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" ng-click="members.data.banner = null"><span aria-hidden="true">&times;</span></button>
                                <span ng-bind-html="members.data.banner.html_safe"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <minute-include-content></minute-include-content>
</div>

<!--<script src="/static/bower_components/MembersLTE/dist/js/app.js"></script>-->

<script>
    angular.bootstrap(document.getElementById("membersContainer"), ['MembersApp']);
</script>

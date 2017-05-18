<div class="content-wrapper ng-cloak" ng-app="dashboardEditApp" ng-controller="dashboardEditController as mainCtrl" ng-init="init()" ng-cloak="">
    <div class="container-fluid">
        <div class="member-content">
            <div class="row">
                <div class="col-lg-8">
                    <section class="content-header">
                        <h1 class="pull-left">
                            <i class="fa {{settings.icon}}" ng-show="settings.icon"></i>
                            {{(settings.title || 'Dashboard') | translate}}
                        </h1>

                        <a href="" class="btn btn-flat btn-primary btn-xs pull-right" ng-href="{{settings.create.link}}">
                            <i class="fa {{settings.create.icon}}" ng-show="settings.create.icon"></i>
                            <span ng-bind-html="(settings.create.label || defaults.create.label) | replaceTags | translate | safe"></span>
                        </a>

                        <div class="clearfix"></div>
                    </section>

                    <section class="content">
                        <form class="form-horizontal" name="dashboardForm">
                            <div class="alert alert-info alert-dismissible" ng-if="settings.alert.heading" ng-show="!mainCtrl.expired(settings.alert.expire)">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                                <h4 ng-bind-html="(settings.alert.heading || defaults.alert.heading) | replaceTags | safe"></h4>
                                <p ng-bind-html="(settings.alert.html || defaults.alert.html) | replaceTags | safe"></p>
                            </div>

                            <div class="box box-{{dashboardForm.$valid && 'success' || 'danger'}}">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><span ng-bind-html="(settings.heading.heading || defaults.heading.html) | replaceTags | safe"></span></h3>

                                    <div class="box-tools" ng-if="!!settings.buttons.length">
                                        <span ng-repeat="button in settings.buttons">
                                            <a class="btn btn-sm btn-default btn-flat" ng-href="{{button.href}}" youtube-link>
                                                <i class="fa {{button.icon}}" ng-show="button.icon"></i> <span ng-bind-html="button.title | replaceTags | safe"></span>
                                            </a>
                                        </span>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <p ng-if="settings.heading.subHeading" ng-bind-html="settings.heading.subHeading | replaceTags | safe"></p>

                                    <div ng-repeat="step in settings.steps" ng-show="mainCtrl.isVisible(step.levels)" class="wow bounceInUp" data-wow-delay="{{$index}}s">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h3 ng-show="!!step.heading">
                                                    <span class="fa-stack fa-1x fa-sm"><i class="fa fa-circle-o fa-stack-2x"></i><i class="fa fa-stack-1x">{{$index+1}}</i></span>
                                                    <span ng-bind-html="step.heading | replaceTags | safe"></span>
                                                </h3>

                                                <p ng-show="!!step.description" ng-bind-html="step.description | replaceTags | safe"></p>
                                            </div>

                                            <div class="col-md-5" ng-show="!!step.thumbnail">
                                                <a ng-href="{{step.video || '#'}}" youtube-link="{controls: 1}">
                                                    <img src="" ng-src="{{step.thumbnail}}" width="95%" class="thumbnail" style="cursor:{{settings.video.id && 'pointer' || 'default'}}">
                                                </a>
                                            </div>
                                        </div>

                                        <hr ng-show="!$last">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="box-footer with-border" ng-show="settings.create.link">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <a href="" ng-href="{{settings.create.link}}" class="btn btn-flat btn-primary btn-lg">
                                                <i class="fa {{settings.create.icon}}" ng-show="settings.create.icon"></i>
                                                <span ng-bind-html="(settings.create.label2 || defaults.create.label2) | replaceTags | safe"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="content-header visible-lg">
                        <h1>&nbsp;</h1>
                        <ol class="breadcrumb">
                            <li><a href="" ng-href="/admin"><i class="fa fa-sign-in"></i> <span translate="">Member's area</span></a></li>
                            <li class="active"><i class="fa {{settings.icon}}" ng-show="settings.icon"></i> {{(settings.title || 'Dashboard')}}</li>
                        </ol>
                    </section>

                    <section class="content" ng-show="!!settings.sidebars.length">
                        <div ng-repeat="sidebar in settings.sidebars" ng-show="mainCtrl.isVisible(sidebar.levels)">
                            <div class="box box-default">
                                <div class="box-header with-border" ng-show="sidebar.heading">
                                    <h3 class="box-title" ng-show="sidebar.heading"><span ng-bind-html="(sidebar.heading || defaults.heading.html) | replaceTags | safe"></span></h3>
                                    <p ng-if="sidebar.subHeading" ng-bind-html="sidebar.subHeading | replaceTags | safe"></p>
                                </div>

                                <div class="box-body">
                                    <div id="sideBar{{$index}}" ng-init="mainCtrl.inject('#sideBar' + $index, sidebar.html | replaceTags)"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

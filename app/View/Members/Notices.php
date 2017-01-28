<div class="content-wrapper ng-cloak" ng-app="noticeListApp" ng-controller="noticeListController as mainCtrl" ng-init="init()" xmlns="http://www.w3.org/1999/html">
    <div class="member-content">
        <section class="content-header">
            <h1><span translate="">News feed</span></h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/member"><i class="fa fa-dashboard"></i> <span translate="">Member</span></a></li>
                <li class="active"><i class="fa fa-notice"></i> <span translate="">Recent activity</span></li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span translate="">Recent activity</span>
                    </h3>
                </div>

                <div class="box-body">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-bar list-group-item-bar-{{notice.seen && 'success' || 'danger'}}"
                             ng-repeat="notice in notices" ng-click-container="mainCtrl.actions(notice)">
                            <div class="pull-left">
                                <h4 class="list-group-item-heading" ng-class="{'text-bold': !notice.seen}">
                                    <i class="fa fa-fw fa-lg {{notice.icon}} text-normal" ng-if="!!notice.icon"></i>
                                    {{notice.title | ucfirst}} <small({{notice.created_at | timeAgo}})</small>
                                </h4>
                                <p class="list-group-item-text hidden-xs">{{notice.description}}</p>
                            </div>
                            <div class="md-actions pull-right">
                                <div ng-switch="" on="notice.links_json.length === 1" ng-init="link = notice.links_json[0]" ng-click="mainCtrl.seen(notice)">
                                    <a class="btn btn-default btn-flat btn-sm" ng-href="{{link.href}}" ng-switch-when="true">
                                        <i class="fa fa-fw {{link.icon}}"></i> {{link.label | ucfirst}}
                                    </a>
                                    <a class="btn btn-default btn-flat btn-sm btn-block" ng-href="/members/notices/view/{{notice.member_notice_id}}" ng-switch-default>
                                        <i class="fa fa-eye"></i> <span translate="">View details..</span>
                                    </a>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-push-6">
                            <minute-pager class="pull-right" on="notices" no-results="{{'No notices found' | translate}}"></minute-pager>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-pull-6">
                            <minute-search-bar on="notices" columns="name, description" label="{{'Search notice..' | translate}}"></minute-search-bar>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

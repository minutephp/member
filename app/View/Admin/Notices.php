<div class="content-wrapper ng-cloak" ng-app="noticeListApp" ng-controller="noticeListController as mainCtrl" ng-init="init()">
    <div class="admin-content">
        <section class="content-header">
            <h1><span translate="">List of notices</span> <small><span translate="">info</span></small></h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li class="active"><i class="fa fa-notice"></i> <span translate="">Notice list</span></li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span translate="">All notices</span>
                    </h3>

                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary btn-flat" ng-href="/admin/notices/edit">
                            <i class="fa fa-plus-circle"></i> <span translate="">Create new notice</span>
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span translate="">Notices provide an easy way to convert "user events" into member notifications (often shown as a news feed).
                            Any %tags% in title or description are automatically replaced with keys of event data.</span> - <a href="" minute-tutorial="user-notices">learn more</a>.
                    </div>
                    <div class="list-group">
                        <div class="list-group-item list-group-item-bar list-group-item-bar-default"
                             ng-repeat="notice in notices" ng-click-container="mainCtrl.actions(notice)">
                            <div class="pull-left">
                                <h4 class="list-group-item-heading">{{notice.name | ucfirst}}</h4>
                                <p class="list-group-item-text hidden-xs">
                                    <span translate="">Title:</span> {{notice.description | truncate:50:'..'}}.
                                </p>
                                <p class="list-group-item-text hidden-xs">
                                    <span translate="">Description:</span> {{notice.description | truncate:50:'..'}}.
                                </p>
                            </div>
                            <div class="md-actions pull-right">
                                <a class="btn btn-default btn-flat btn-sm" ng-href="/admin/notices/edit/{{notice.notice_id}}">
                                    <i class="fa fa-pencil-square-o"></i> <span translate="">Edit..</span>
                                </a>
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
                            <minute-search-bar on="notices" columns="name, title, description" label="{{'Search notice..' | translate}}"></minute-search-bar>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

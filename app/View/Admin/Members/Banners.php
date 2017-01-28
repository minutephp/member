<div class="content-wrapper ng-cloak" ng-app="bannerListApp" ng-controller="bannerListController as mainCtrl" ng-init="init()">
    <div class="admin-content">
        <section class="content-header">
            <h1><span translate="">List of banners</span> <small><span translate="">info</span></small></h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li class="active"><i class="fa fa-banner"></i> <span translate="">Banner list</span></li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span translate="">All banners</span>
                    </h3>

                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary btn-flat" ng-href="/admin/members/banners/edit">
                            <i class="fa fa-plus-circle"></i> <span translate="">Create new banner</span>
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><i class="fa fa-info"></i> <span translate="">You can display banners throughout the member's area during certain time intervals for promotion.</span></p>
                        <p><span translate="">E.g. Christmas Sale banner from 24/Dec to 26/Dec, New year sale from 31/Dec to 02/Jan, etc.</span></p>
                    </div>

                    <div class="list-group">
                        <div class="list-group-item list-group-item-bar list-group-item-bar-{{banner.enabled && 'success' || 'danger'}}"
                             ng-repeat="banner in banners" ng-click-container="mainCtrl.actions(banner)">
                            <div class="pull-left">
                                <h4 class="list-group-item-heading">{{banner.name | ucfirst}}</h4>
                                <p class="list-group-item-text hidden-xs">
                                    <span translate="">Starts </span> {{banner.starts_at | timeAgo}}.
                                    <span translate="">Ends </span> {{banner.expires_at | timeAgo}}.
                                    <span translate="" ng-show="banner.repeat">(repeats every year)</span>
                                </p>
                            </div>
                            <div class="md-actions pull-right">
                                <a class="btn btn-default btn-flat btn-sm" ng-href="/admin/members/banners/edit/{{banner.member_banner_id}}">
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
                            <minute-pager class="pull-right" on="banners" no-results="{{'No banners found' | translate}}"></minute-pager>
                        </div>
                        <div class="col-xs-12 col-md-6 col-md-pull-6">
                            <minute-search-bar on="banners" columns="name, html_safe" label="{{'Search banners..' | translate}}"></minute-search-bar>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

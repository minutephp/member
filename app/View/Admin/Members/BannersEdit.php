<div class="content-wrapper ng-cloak" ng-app="bannerEditApp" ng-controller="bannerEditController as mainCtrl" ng-init="init()">
    <div class="admin-content">
        <section class="content-header">
            <h1>
                <span translate="" ng-show="!banner.member_banner_id">Create new</span>
                <span translate="" ng-show="!!banner.member_banner_id">Edit</span>
                <span translate="">banner</span>
            </h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li><a href="" ng-href="/admin/members/banners"><i class="fa fa-banner"></i> <span translate="">Banners</span></a></li>
                <li class="active"><i class="fa fa-edit"></i> <span translate="">Edit banner</span></li>
            </ol>
        </section>

        <section class="content">
            <form class="form-horizontal" name="bannerForm" ng-submit="mainCtrl.save()">
                <div class="box box-{{bannerForm.$valid && 'success' || 'danger'}}">
                    <div class="box-header with-border">
                        <span translate="" ng-show="!banner.member_banner_id">New banner</span>
                        <span ng-show="!!banner.member_banner_id"><span translate="">Edit</span> {{banner.name}}</span>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name"><span translate="">Name:</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" ng-model="banner.name" ng-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="starts_at"><span translate="">Duration:</span></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="starts_at" placeholder="Enter Starts on" ng-model="banner.starts_at" ng-required="true">
                                <p class="help-block"><span translate="">(start date)</span></p>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="expires_at" placeholder="Enter Expires on" ng-model="banner.expires_at" ng-required="true">
                                <p class="help-block"><span translate="">(end date)</span></p>
                            </div>
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" ng-model="banner.repeat"> <span translate="">Repeat every year</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="html"><span translate="">Html code:</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" placeholder="Enter Html code:" ng-model="banner.html_safe" ng-required="true"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="visibility"><span translate="">Visibility:</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="visibility" placeholder="Comma separated user groups" ng-model="banner.visibility" ng-required="false">
                                <p class="help-block"><span translate="">(comma separated list of groups who can see it - leave blank to show to all)</span></p>
                            </div>
                        </div>


                    </div>

                    <div class="box-footer with-border">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-flat btn-primary">
                                    <span translate="" ng-show="!banner.member_banner_id">Create</span>
                                    <span translate="" ng-show="!!banner.member_banner_id">Update</span>
                                    <span translate="">banner</span>
                                    <i class="fa fa-fw fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

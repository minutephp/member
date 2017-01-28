<div class="content-wrapper ng-cloak" ng-app="noticeEditApp" ng-controller="noticeEditController as mainCtrl" ng-init="init()">
    <div class="members-content">
        <section class="content-header">
            <h1><span translate="">Item Details</span></h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/members"><i class="fa fa-dashboard"></i> <span translate="">Members</span></a></li>
                <li><a href="" ng-href="/members/notices"><i class="fa fa-tags"></i> <span translate="">Activity</span></a></li>
                <li class="active"><i class="fa fa-eye"></i> <span translate="">View</span></li>
            </ol>
        </section>

        <section class="content">
            <form class="form-horizontal" name="noticeForm" ng-submit="mainCtrl.save()">
                <div class="box box-{{noticeForm.$valid && 'success' || 'danger'}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span translate="">Title:</span></label>
                        <div class="col-sm-9">
                            <p class="help-block" translate="">{{notice.title}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span translate="">Description:</span></label>
                        <div class="col-sm-9">
                            <p class="help-block" translate="">{{notice.description}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <a class="btn btn-flat {{link.class || (!$index && 'btn-primary' || 'btn-default')}}" ng-repeat="link in notice.links_json" ng-href="{{link.href}}">
                                <i class="fa fa-fw {{link.icon}}"></i> {{link.label}}
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </form>
        </section>
    </div>
</div>

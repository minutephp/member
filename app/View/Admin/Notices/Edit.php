<div class="content-wrapper ng-cloak" ng-app="noticeEditApp" ng-controller="noticeEditController as mainCtrl" ng-init="init()">
    <div class="admin-content" minute-hot-keys="{'ctrl+s':mainCtrl.save}">
        <section class="content-header">
            <h1>
                <span translate="" ng-show="!notice.notice_id">Create new</span>
                <span translate="" ng-show="!!notice.notice_id">Edit</span>
                <span translate="">notice</span>
            </h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li><a href="" ng-href="/admin/notices"><i class="fa fa-notice"></i> <span translate="">Notices</span></a></li>
                <li class="active"><i class="fa fa-edit"></i> <span translate="">Edit notice</span></li>
            </ol>
        </section>

        <section class="content">
            <form class="form-horizontal" name="noticeForm" ng-submit="mainCtrl.save()">
                <div class="box box-{{noticeForm.$valid && 'success' || 'danger'}}">
                    <div class="box-header with-border">
                        <span translate="" ng-show="!notice.notice_id">New notice</span>
                        <span ng-show="!!notice.notice_id"><span translate="">Edit</span> {{notice.name}}</span>
                    </div>

                    <div class="box-body">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Name:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="notice.name" id="name" ng-required="true" placeholder="Name" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title">Title:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="notice.title" id="title" ng-required="true" placeholder="Title" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="notice.description" id="description" placeholder="Description" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="icon">Icon:</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" ng-model="notice.icon" id="icon" placeholder="fa-thumbs-up" />
                                        <div class="input-group-addon"><i class="fa fa-lg fa-fw {{notice.icon}}"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="links_json">Links:</label>

                                <div class="col-sm-10">
                                    <div ng-repeat="link in links">
                                        <div class="row" style="margin-left:-15px; padding-bottom:10px;">
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" ng-model="link['label']" ng-required="true" placeholder="Anchor text" />
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" ng-model="link['href']" ng-required="true" placeholder="Link (http://)" />
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" ng-model="link['icon']" placeholder="fa-check-circle" />
                                                    <div class="input-group-addon"><i class="fa fa-fw {{link['icon']}}"></i></div>
                                                </div>

                                            </div>
                                            <div class="col-sm-1">
                                                <div class="pull-right"><a href="" ng-click="links.splice($index, 1)" class="text-muted text-small"><i class="fa fa-remove"></i></a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="help-block">
                                        <button type="button" class="btn btn-default btn-xs" ng-click="links.push({})"><i class="fa fa-check-circle"></i> Add link</button>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="class">Class:</label>

                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" ng-model="notice.class" name="class" ng-value="'default'"> default
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model="notice.class" name="class" ng-value="'success'"> success
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model="notice.class" name="class" ng-value="'danger'"> danger
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model="notice.class" name="class" ng-value="'warning'"> warning
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model="notice.class" name="class" ng-value="'info'"> info
                                    </label>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <div class="box-footer with-border">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-flat btn-primary">
                                    <span translate="" ng-show="!notice.notice_id">Create</span>
                                    <span translate="" ng-show="!!notice.notice_id">Update</span>
                                    <span translate="">notice</span>
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

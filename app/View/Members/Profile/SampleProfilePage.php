<div class="content-wrapper ng-cloak" ng-app="profileEditApp" ng-controller="profileEditController as mainCtrl" ng-init="init()">
    <div class="members-content">
        <section class="content">
            <minute-event name="IMPORT_USER_GET_PROFILE_FIELDS" as="data.fields"></minute-event>

            <div id="tabs"></div>

            <div class="tab-content">
                <form class="form-horizontal" name="profileForm" ng-submit="mainCtrl.save()">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <span translate="">Your personal details</span>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="first_name"><span translate="">Full name:</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="first_name" placeholder="First name" ng-model="user.first_name" ng-required="true">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="last_name" placeholder="Last name" ng-model="user.last_name" ng-required="false">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="email"><span translate="">Email address:</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email address" ng-model="user.email" ng-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span translate="">Profile photo:</span></label>
                                <div class="col-sm-9">
                                    <div class="help-block">
                                        <minute-uploader ng-model="user.photo_url" type="image" preview="true" remove="true" label="{{'Upload photo..'|translate}}"></minute-uploader>
                                    </div>
                                </div>
                            </div>

                            <hr ng-show="!!data.fields.length" />

                            <div class="form-group" ng-repeat="field in data.fields">
                                <label class="col-sm-3 control-label">{{field.label}}:</label>
                                <div class="col-sm-9">
                                    <input type="{{field.type || 'text'}}" class="form-control" placeholder="{{field.placeholder || 'Enter ' + field.label}}"
                                           ng-model="user.data[mainCtrl.indexOf(field.field)].data" ng-required="field.required">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer with-border">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-flat btn-primary">
                                        <span translate="">Update profile</span>
                                        <i class="fa fa-fw fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

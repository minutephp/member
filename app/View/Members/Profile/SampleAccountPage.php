<div class="content-wrapper ng-cloak" ng-app="accountEditApp" ng-controller="accountEditController as mainCtrl">
    <div class="members-content">
        <section class="content">
            <div id="tabs"></div>

            <div class="tab-content">
                <form class="form-horizontal" name="profileForm" ng-submit="mainCtrl.save()">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <span translate="">Your {{session.site.site_name}} account</span>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span translate="">Password:</span></label>
                                <div class="col-sm-9">
                                    <p class="help-block" translate="">
                                        <button type="button" class="btn btn-flat btn-info" ng-click="mainCtrl.passwordPopup()">
                                            <i class="fa fa-key"></i> <span translate="">Change password..</span>
                                        </button>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span translate="">Cancel:</span></label>
                                <div class="col-sm-9">
                                    <p class="help-block" translate="">
                                        <button type="button" class="btn btn-flat btn-danger" ng-click="mainCtrl.cancel()">
                                            <i class="fa fa-warning"></i> <span translate="">Cancel account..</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script type="text/ng-template" id="/password-popup.html">
        <div class="box box-md">
            <div class="box-header with-border">
                <b class="pull-left"><span translate="">Change password</span></b>
                <a class="pull-right close-button" href=""><i class="fa fa-times"></i></a>
                <div class="clearfix"></div>
            </div>

            <form class="form-horizontal" name="passwordForm" ng-submit="save(data)">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="current"><span translate="">Current password:</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="current" placeholder="Enter Current password" ng-model="data.current" ng-required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="password1"><span translate="">New password:</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" placeholder="Enter New password" ng-model="data.password" ng-required="true" minlength="3">
                            <p class="help-block"><span translate="">Strong password contain number, letters and special characters</span></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="password2"><span translate="">Confirm password:</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password2" placeholder="Enter Confirm password" ng-model="data.password2" ng-required="true" minlength="3">
                            <p class="help-block" ng-switch="!!data.password && !!data.password2 && (data.password != data.password2)">
                                <span class="text-danger" ng-switch-when="true">Passwords do not match</span>
                                <span class="text-danger" ng-switch-default="">&nbsp;</span>
                            </p>
                        </div>
                    </div>

                </div>

                <div class="box-footer with-border">
                    <button type="submit" class="btn btn-flat btn-primary pull-right" ng-disabled="!passwordForm.$valid">
                        <i class="fa fa-check-circle"></i> <span translate>Change password</span>
                    </button>
                </div>
            </form>
        </div>
    </script>

</div>

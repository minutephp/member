<div class="content-wrapper ng-cloak" ng-app="configEditApp" ng-controller="configEditController as mainCtrl" ng-init="init()">
    <div class="admin-content">
        <section class="content-header">
            <h1><span translate="">Member's area dashboard</span></h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li><a href="" ng-href="/admin/members"><i class="fa fa-sign-in"></i> <span translate="">Member's area</span></a></li>
            </ol>
        </section>

        <section class="content">
            <form class="form-horizontal" name="configForm" ng-submit="mainCtrl.save()">
                <div class="box box-{{configForm.$valid && 'success' || 'danger'}}">
                    <div class="box-body">
                        <div class="tabs-panel">
                            <ul class="nav nav-tabs">
                                <li ng-class="{active: panel === data.tabs.selectedPanel}" ng-repeat="panel in data.panels" ng-init="data.tabs.selectedPanel = data.tabs.selectedPanel || panel">
                                    <a href="" ng-click="data.tabs.selectedPanel = panel">{{panel.name}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" ng-if="data.tabs.selectedPanel.name === 'Main'">
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span translate="">Quickly setup the dashboard of your member's area by filling the form below. If you wish to use your own custom dashboard, just
                                            override the `/members` route.</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="title">Page title:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" ng-model="settings.title" placeholder="Main title" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="title">Page title icon:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" ng-model="settings.icon" placeholder="fa-dashboard" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="welcome">Page heading:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" ng-model="settings.heading.heading" placeholder="Welcome %first_name%!" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="welcome">Page subheading:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" ng-model="settings.heading.subHeading" placeholder="Let's get started" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="buttons">Shortcut buttons:</label>

                                        <div ng-repeat="button in settings.buttons">
                                            <div class="col-sm-4 {{!!$index && 'col-sm-offset-2' || ''}}">
                                                <input type="text" class="form-control" ng-model="button.title" placeholder="Get started, Help Video, PDF manual, etc">
                                            </div>

                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" ng-model="button.href" placeholder="/members/help, YouTube video, etc">
                                            </div>

                                            <div class="col-sm-3 with-close-button">
                                                <a href="" ng-click="settings.buttons.splice($index, 1)" class="close">x</a>
                                                <input type="text" class="form-control" ng-model="button.icon" placeholder="fa-download, fa-file-pdf-o">
                                            </div>
                                        </div>

                                        <div class="col-sm-10 {{settings.buttons.length && 'col-sm-offset-2' || ''}}">
                                            <button type="button" class="btn btn-flat btn-xs btn-default" ng-click="settings.buttons.push({})">
                                                <i class="fa fa-plus-circle"></i> <span translate="">Add button</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="create">Create button:</label>

                                        <div class="col-sm-10">
                                            <div class="row inline-row">
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" ng-model="settings.create.label" placeholder="Create button label (top)" />
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" ng-model="settings.create.label2" placeholder="Create button label 2 (bottom)" />
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" ng-model="settings.create.link" placeholder="Create button link" />
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" ng-model="settings.create.icon" placeholder="fa-plus-circle" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="welcome"><span translate="">Call out heading:</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" ng-model="settings.alert.heading" placeholder="New to site? Watch this tutorial to get started instantly!" />
                                            <p class="help-block"><span translate="">Displays an alert in member's area (for all members) if filled</span></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="callout">
                                            <span translate="">Call out html:</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" placeholder="Html content for callout like link to YouTube video, etc" ng-model="settings.alert.html"
                                                      ng-required="false"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="callout_expire"><span translate="">Callout expires:</span></label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Number of days it is visible wrt signup date" ng-model="settings.alert.expire"
                                                       ng-required="false">
                                                <div class="input-group-addon">days after signup</div>
                                            </div>

                                            <p class="help-block"><span translate="">Hides the callout forever after it has been show a particular number of times.</span></p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Skip Animation:</label>

                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" ng-model="settings.noAnimate"> No animations
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" ng-if="data.tabs.selectedPanel.name === 'Steps'">
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span translate="">Tell your member's exactly how your site works step-by-step using photos, videos and text.</span>
                                    </div>

                                    <div ng-repeat="step in settings.steps">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="step1">Step #{{$index+1}}:</label>

                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" ng-model="step.heading" ng-required="true"
                                                       placeholder="Step heading e.g. Create a new project, Fill in the keyword, etc" />
                                                <br>
                                                <textarea class="form-control" ng-model="step.description" rows="3"
                                                          placeholder="Step description, e.g. Explain what to click, what to enter where, what to expect, etc"></textarea>
                                                <br>
                                                <minute-uploader ng-model="step.thumbnail" type="image" preview="true" remove="true" label="Upload step thumbnail.."></minute-uploader>
                                                <br>&nbsp;
                                                <input type="url" class="form-control" ng-model="step.video" placeholder="Youtube video to explain this step (optional)" />
                                                <br>
                                                <input type="text" class="form-control" ng-model="step.levels" placeholder="Visible to levels, e.g. power, business (optional)" />
                                            </div>

                                            <div class="col-sm-1 pull-right"><a href="" ng-click="settings.steps.splice($index, 1)">x</a></div>
                                        </div>

                                        <hr ng-show="!$last">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <hr>
                                            <button type="button" class="btn btn-default btn-sm" ng-click="settings.steps.push({})">
                                                <i class="fa fa-plus-circle"></i> <span translate="">Add step</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" ng-if="data.tabs.selectedPanel.name === 'Sidebar'">
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span translate="">Useful links and resources for your members. You can also embed your live twitter feed or paste other Html code too!</span>
                                    </div>
                                    <div ng-repeat="sidebar in settings.sidebars">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="sidebar">Sidebar #{{$index+1}}:</label>

                                            <div class="col-sm-1 pull-right"><a href="" ng-click="settings.sidebars.splice($index, 1)">x</a></div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <input type="text" class="form-control" ng-model="sidebar.heading" ng-required="true" placeholder="Sidebar heading" />
                                                    <br>
                                                    <input type="text" class="form-control" ng-model="sidebar.subHeading" placeholder="Sidebar sub-heading" />
                                                    <br>
                                                    <textarea class="form-control" ng-model="sidebar.html" placeholder="Sidebar html code" rows="3"></textarea>
                                                    <a href="" google-search="embed twitter timeline widget"><span translate="">Embed twitter timeline</span></a>
                                                    <br><br>
                                                    <input type="text" class="form-control" ng-model="sidebar.levels" placeholder="Visible to levels, e.g. power, business" />
                                                </div>
                                            </div>
                                        </div>

                                        <hr ng-show="!$last">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <hr>
                                            <button type="button" class="btn btn-default btn-sm" ng-click="settings.sidebars.push({})"><i class="fa fa-plus-circle"></i> Add sidebar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer with-border">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-flat btn-primary">
                                    <span translate="">Save settings</span> <i class="fa fa-fw fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
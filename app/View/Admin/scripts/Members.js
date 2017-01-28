/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var Admin;
(function (Admin) {
    var ConfigEditController = (function () {
        function ConfigEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.save = function () {
                _this.$scope.config.save(_this.gettext('Config saved successfully'));
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.data = { tabs: {}, panels: [{ name: 'Main' }, { name: 'Steps' }, { name: 'Sidebar' }] };
            var loadSample = !$scope.configs[0];
            $scope.config = $scope.configs[0] || $scope.configs.create().attr('type', 'members').attr('data_json', {});
            $scope.settings = $scope.config.attr('data_json');
            if (loadSample) {
                var sample = {
                    "steps": [
                        {
                            "heading": "Step #1",
                            "description": "This is step #1",
                            "levels": "",
                            "thumbnail": "https://uploads.minutephp.com/users/1/image/output_cmVSvL.gif"
                        },
                        {
                            "heading": "Step #2",
                            "description": "This is step #2. It can contain <b>html</b>",
                            "thumbnail": "https://uploads.minutephp.com/users/1/image/output_tvT1nv.gif"
                        },
                        {
                            "heading": "Step #3",
                            "description": "This is step #3",
                            "thumbnail": "https://uploads.minutephp.com/users/1/image/output_dNvy9H.gif"
                        }
                    ],
                    "sidebars": [
                        {
                            "heading": "Useful links",
                            "subHeading": "Other useful video creation tools:",
                            "html": "<ul>\n<li><a href=\"//animoto.com\" target=\"_blank\">Animoto video maker</a></li>\n<li><a href=\"//stupeflix.com\" target=\"_blank\">Stupeflix</a></li>\n</ul>",
                            "levels": ""
                        },
                        {
                            "heading": "What's new?",
                            "subHeading": "Latest updates and news",
                            "html": "embed twitter feed widget here",
                            "levels": ""
                        }
                    ],
                    "title": "Dashboard",
                    "video": {
                        "id": "0TjxnrWT8Es",
                        "blurb": "Create a video in only 2 minutes! Click here to watch a small video tutorial."
                    },
                    "create": {
                        "link": "/create",
                        "label": "Create project",
                        "label2": "Create new project",
                        "icon": "fa-caret-right"
                    },
                    "welcome": {
                        "heading": "Welcome %first_name%!",
                        "subHeading": "Create your first video in 3 simple steps:"
                    },
                    "noAnimate": false,
                    "manual": {
                        "link": "test",
                        "text": ""
                    },
                    "icon": "fa-dashboard",
                    "buttons": [
                        {
                            "html": "Play video",
                            "href": "https://www.youtube.com/watch?v=jVMSIy1V8xQ",
                            "icon": "fa-youtube-play",
                            "title": "2 min video"
                        }
                    ],
                    "heading": {
                        "heading": "Welcome %session.user.first_name%!",
                        "subHeading": "Let's get started"
                    },
                    "alert": {
                        "heading": "New to site? Watch this 2 min video to get started instantly!",
                        "html": "<a class=\"btn btn-default btn-info\" href=\"https://www.youtube.com/watch?v=jVMSIy1V8xQ\" target=\"_blank\"><i class=\"fa fa-youtube-play\"></i> Play video</a>",
                        "expire": 3
                    }
                };
                angular.extend($scope.settings, sample);
            }
            $scope.settings.buttons = angular.isArray($scope.settings.buttons) ? $scope.settings.buttons : [{}];
            $scope.settings.steps = angular.isArray($scope.settings.steps) ? $scope.settings.steps : [{}];
            $scope.settings.sidebars = angular.isArray($scope.settings.sidebars) ? $scope.settings.sidebars : [{}];
        }
        return ConfigEditController;
    }());
    Admin.ConfigEditController = ConfigEditController;
    angular.module('configEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('configEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', ConfigEditController]);
})(Admin || (Admin = {}));

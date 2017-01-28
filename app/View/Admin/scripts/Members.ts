/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module Admin {
    export class ConfigEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');

            $scope.data = {tabs: {}, panels: [{name: 'Main'}, {name: 'Steps'}, {name: 'Sidebar'}]};

            let loadSample = !$scope.configs[0];
            $scope.config = $scope.configs[0] || $scope.configs.create().attr('type', 'members').attr('data_json', {});
            $scope.settings = $scope.config.attr('data_json');

            if (loadSample) {
                let sample = {
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

        save = () => {
            this.$scope.config.save(this.gettext('Config saved successfully'));
        };
    }

    angular.module('configEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('configEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', ConfigEditController]);
}

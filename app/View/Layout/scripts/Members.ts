/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module Members {
    export class MembersController {
        public links = [];

        constructor(public $scope:any, public $timeout:ng.ITimeoutService, public gettextCatalog:any, public $minute: any) {
            this.gettextCatalog.setCurrentLanguage('en');
            $scope.data = {menu: [], profile: []};
        }
    }

    export class ngClickContainer implements ng.IDirective {
        restrict = 'A';
        scope = {ngClickContainer: '&'};

        static instance = () => new ngClickContainer;

        link = ($scope:any, element:ng.IAugmentedJQuery) => {
            element.on('click', (ev) => {
                let target = $(ev.target);
                if (!target.is('a, button, input') && !(target.is('span') && target.parent().is('a, button, input'))) {
                    $scope.$apply(() => $scope.ngClickContainer($scope, {$event: event}));
                }
            });
        }
    }

    export class autoFocus implements ng.IDirective {
        restrict = 'A';
        scope = {};

        static instance = () => new autoFocus;

        link = ($scope:any, element:ng.IAugmentedJQuery) => {
            setTimeout((e) => e.focus(), 400, element);
        }
    }

    export class MyFilters {
        static safe = ($sanitize) => {
            return function (str) {
                return $sanitize(str || '');
            }
        };

        static raw = ($sce) => {
            return function (str) {
                return $sce.trustAsHtml(str);
            }
        };

        static firstChar = () => {
            return function (str) {
                return (str || '').substr(0, 1).toUpperCase();
            }
        };
    }

    angular.module('MembersApp', ['MinuteFramework', 'MinuteImporter', 'AngularTreeMenu', 'MinuteDirectives', 'MinuteFilters', 'angular-loading-bar', 'angular.filter', 'gettext', 'angular-bs-tooltip', 'ngSanitize'])
        .controller('membersController', ['$scope', '$timeout', 'gettextCatalog', '$minute', MembersController])
        .directive('ngClickContainer', ngClickContainer.instance)
        .directive('autoFocus', autoFocus.instance)
        .filter("firstChar", MyFilters.firstChar)
        .filter("safe", MyFilters.safe)
        .filter("rawHtml", MyFilters.raw);
}


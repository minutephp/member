/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var Members;
(function (Members) {
    var MembersController = (function () {
        function MembersController($scope, $timeout, gettextCatalog, gettext, $minute, $ui) {
            this.$scope = $scope;
            this.$timeout = $timeout;
            this.gettextCatalog = gettextCatalog;
            this.gettext = gettext;
            this.$minute = $minute;
            this.$ui = $ui;
            this.links = [];
            this.gettextCatalog.setCurrentLanguage('en');
            $scope.data = { menu: [], profile: [] };
            if (!$scope.session.site.skipAccessCheck) {
                var pass_1 = false;
                angular.forEach($scope.session.user.groups, function (group) {
                    pass_1 = pass_1 || (group.access == 'primary' && group.expiry_days > 0);
                });
                if (!pass_1) {
                    this.$ui.alert(this.gettext('<b>Your account has expired.</b> Please buy a subscription if you wish to continue using this account.'), 'Continue').then(function () {
                        top.location.href = $scope.session.site.urls.pricing || '/pricing';
                    });
                }
            }
        }
        return MembersController;
    }());
    Members.MembersController = MembersController;
    var ngClickContainer = (function () {
        function ngClickContainer() {
            this.restrict = 'A';
            this.scope = { ngClickContainer: '&' };
            this.link = function ($scope, element) {
                element.on('click', function (ev) {
                    var target = $(ev.target);
                    if (!target.is('a, button, input') && !(target.is('span') && target.parent().is('a, button, input'))) {
                        $scope.$apply(function () { return $scope.ngClickContainer($scope, { $event: event }); });
                    }
                });
            };
        }
        ngClickContainer.instance = function () { return new ngClickContainer; };
        return ngClickContainer;
    }());
    Members.ngClickContainer = ngClickContainer;
    var autoFocus = (function () {
        function autoFocus() {
            this.restrict = 'A';
            this.scope = {};
            this.link = function ($scope, element) {
                setTimeout(function (e) { return e.focus(); }, 400, element);
            };
        }
        autoFocus.instance = function () { return new autoFocus; };
        return autoFocus;
    }());
    Members.autoFocus = autoFocus;
    var MyFilters = (function () {
        function MyFilters() {
        }
        MyFilters.safe = function ($sanitize) {
            return function (str) {
                return $sanitize(str || '');
            };
        };
        MyFilters.raw = function ($sce) {
            return function (str) {
                return $sce.trustAsHtml(str);
            };
        };
        MyFilters.firstChar = function () {
            return function (str) {
                return (str || '').substr(0, 1).toUpperCase();
            };
        };
        return MyFilters;
    }());
    Members.MyFilters = MyFilters;
    angular.module('MembersApp', ['MinuteFramework', 'MinuteImporter', 'AngularTreeMenu', 'MinuteDirectives', 'MinuteFilters', 'angular-loading-bar', 'angular.filter', 'gettext', 'angular-bs-tooltip', 'ngSanitize'])
        .controller('membersController', ['$scope', '$timeout', 'gettextCatalog', 'gettext', '$minute', '$ui', MembersController])
        .directive('ngClickContainer', ngClickContainer.instance)
        .directive('autoFocus', autoFocus.instance)
        .filter("firstChar", MyFilters.firstChar)
        .filter("safe", MyFilters.safe)
        .filter("rawHtml", MyFilters.raw);
})(Members || (Members = {}));

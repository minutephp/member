/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var Admin;
(function (Admin) {
    var DashboardEditController = (function () {
        function DashboardEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog, $youtube) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.$youtube = $youtube;
            this.inject = function (sidebar, html) {
                _this.$timeout(function () { return angular.element(sidebar).html(html); });
            };
            this.expired = function (days) {
                if (days > 0) {
                    var moment = window['moment'];
                    var elapsed = moment().diff(moment(_this.$scope.session.user.created_at), 'days');
                    return elapsed > days;
                }
            };
            this.isVisible = function (levels) {
                var groups = _this.$scope.session.user.groups;
                return groups && levels ? _.intersection(groups, levels.split(/,\s*/)).length > 0 : true;
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.defaults = {
                create: { label: 'Create', label2: 'Create project' },
                video: { blurb: '<i class="fa fa-youtube-play"></i> Get started quickly by watching this small video tutorial.' },
                alert: { heading: 'Hi there!', html: '<a href="">Click here to watch a small video!</a>' },
                heading: { html: 'Welcome %session.user.first_name%, how are you today?' },
                manual: { text: '<i class="fa fa-book text-danger"></i> Download manual' }
            };
            $scope.settings = $scope.configs[0] ? $scope.configs[0].attr('data_json') : {};
            var wow = window['WOW'];
            if (wow && !$scope.settings.noAnimate) {
                new wow().init();
            }
        }
        ;
        return DashboardEditController;
    }());
    Admin.DashboardEditController = DashboardEditController;
    angular.module('dashboardEditApp', ['MinuteFramework', 'MembersApp', 'AngularYouTubePopup', 'gettext'])
        .controller('dashboardEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', '$youtube', DashboardEditController]);
})(Admin || (Admin = {}));

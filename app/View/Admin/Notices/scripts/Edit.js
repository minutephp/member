/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var App;
(function (App) {
    var NoticeEditController = (function () {
        function NoticeEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.save = function () {
                _this.$scope.notice.save(_this.gettext('Notice saved successfully'));
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.notice = $scope.notices[0] || $scope.notices.create().attr('class', 'default');
            $scope.notice.links_json = $scope.links = $scope.notice.links_json || [];
        }
        return NoticeEditController;
    }());
    App.NoticeEditController = NoticeEditController;
    angular.module('noticeEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('noticeEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeEditController]);
})(App || (App = {}));

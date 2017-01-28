/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var App;
(function (App) {
    var NoticeEditController = (function () {
        function NoticeEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.notice = $scope.notices[0];
            $timeout(function () { return $scope.notice.attr('seen', true).save(); });
        }
        return NoticeEditController;
    }());
    App.NoticeEditController = NoticeEditController;
    angular.module('noticeEditApp', ['MinuteFramework', 'MembersApp', 'gettext'])
        .controller('noticeEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeEditController]);
})(App || (App = {}));

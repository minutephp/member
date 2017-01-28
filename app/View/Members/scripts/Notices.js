/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var App;
(function (App) {
    var NoticeListController = (function () {
        function NoticeListController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.marked = false;
            this.seen = function (notice) {
                if (!_this.marked) {
                    _this.marked = true;
                    notice.attr('seen', true).save();
                }
            };
            this.actions = function (item) {
                var gettext = _this.gettext;
                var actions = [
                    { 'text': gettext('Details..'), 'icon': 'fa-eye', 'hint': gettext('View more details'), 'href': '/members/notices/view/' + item.notice_id },
                    { 'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this notice'), 'click': 'item.removeConfirm("Removed")' },
                ];
                _this.$ui.bottomSheet(actions, _this.gettext('Actions for this notice'), _this.$scope, { item: item, ctrl: _this });
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }
        return NoticeListController;
    }());
    App.NoticeListController = NoticeListController;
    angular.module('noticeListApp', ['MinuteFramework', 'MembersApp', 'gettext'])
        .controller('noticeListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeListController]);
})(App || (App = {}));

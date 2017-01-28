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
            this.actions = function (item) {
                var gettext = _this.gettext;
                var actions = [
                    { 'text': gettext('Edit..'), 'icon': 'fa-edit', 'hint': gettext('Edit notice'), 'href': '/admin/notices/edit/' + item.notice_id },
                    { 'text': gettext('Clone'), 'icon': 'fa-copy', 'hint': gettext('Clone notice'), 'click': 'ctrl.clone(item)' },
                    { 'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this notice'), 'click': 'item.removeConfirm("Removed")' },
                ];
                _this.$ui.bottomSheet(actions, gettext('Actions for: ') + item.name, _this.$scope, { item: item, ctrl: _this });
            };
            this.clone = function (notice) {
                var gettext = _this.gettext;
                _this.$ui.prompt(gettext('Enter new name'), gettext('new-name')).then(function (name) {
                    notice.clone().attr('name', name).save(gettext('Notice duplicated'));
                });
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }
        return NoticeListController;
    }());
    App.NoticeListController = NoticeListController;
    angular.module('noticeListApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('noticeListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeListController]);
})(App || (App = {}));

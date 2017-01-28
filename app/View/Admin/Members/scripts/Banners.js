/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var App;
(function (App) {
    var BannerListController = (function () {
        function BannerListController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.moment = window['moment'];
            this.actions = function (item) {
                var gettext = _this.gettext;
                var actions = [
                    { 'text': gettext('Edit..'), 'icon': 'fa-edit', 'hint': gettext('Edit banner'), 'href': '/admin/members/banners/edit/' + item.member_banner_id },
                    { 'text': gettext('Clone'), 'icon': 'fa-copy', 'hint': gettext('Clone banner'), 'click': 'ctrl.clone(item)' },
                    { 'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this banner'), 'click': 'item.removeConfirm("Removed")' },
                ];
                _this.$ui.bottomSheet(actions, gettext('Actions for: ') + item.name, _this.$scope, { item: item, ctrl: _this });
            };
            this.clone = function (banner) {
                var gettext = _this.gettext;
                _this.$ui.prompt(gettext('Enter new name'), gettext('new-name')).then(function (name) {
                    banner.clone().attr('name', name).save(gettext('Banner duplicated'));
                });
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }
        return BannerListController;
    }());
    App.BannerListController = BannerListController;
    angular.module('bannerListApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('bannerListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', BannerListController]);
})(App || (App = {}));

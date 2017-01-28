/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var AdminApp;
(function (AdminApp) {
    var BannerEditController = (function () {
        function BannerEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.moment = window['moment'];
            this.save = function () {
                _this.$scope.banner.save(_this.gettext('Banner saved successfully'));
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.banner = $scope.banners[0] || $scope.banners.create().attr('starts_at', new Date()).attr('expires_at', this.moment().add(2, 'days').toDate()).attr('repeat', true);
        }
        return BannerEditController;
    }());
    AdminApp.BannerEditController = BannerEditController;
    angular.module('bannerEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('bannerEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', BannerEditController]);
})(AdminApp || (AdminApp = {}));

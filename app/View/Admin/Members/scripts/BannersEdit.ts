/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module AdminApp {
    export class BannerEditController {
        private moment = window['moment'];

        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.banner = $scope.banners[0] || $scope.banners.create().attr('starts_at', new Date()).attr('expires_at', this.moment().add(2, 'days').toDate()).attr('repeat', true);
        }

        save = () => {
            this.$scope.banner.save(this.gettext('Banner saved successfully'));
        };
    }

    angular.module('bannerEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('bannerEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', BannerEditController]);
}

/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class BannerListController {
        private moment = window['moment'];

        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }

        actions = (item) => {
            let gettext = this.gettext;
            let actions = [
                {'text': gettext('Edit..'), 'icon': 'fa-edit', 'hint': gettext('Edit banner'), 'href': '/admin/members/banners/edit/' + item.member_banner_id},
                {'text': gettext('Clone'), 'icon': 'fa-copy', 'hint': gettext('Clone banner'), 'click': 'ctrl.clone(item)'},
                {'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this banner'), 'click': 'item.removeConfirm("Removed")'},
            ];

            this.$ui.bottomSheet(actions, gettext('Actions for: ') + item.name, this.$scope, {item: item, ctrl: this});
        };

        clone = (banner) => {
            let gettext = this.gettext;
            this.$ui.prompt(gettext('Enter new name'), gettext('new-name')).then(function (name) {
                banner.clone().attr('name', name).save(gettext('Banner duplicated'));
            });
        }
    }

    angular.module('bannerListApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('bannerListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', BannerListController]);
}

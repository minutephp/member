/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class NoticeListController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }

        actions = (item) => {
            let gettext = this.gettext;
            let actions = [
                {'text': gettext('Edit..'), 'icon': 'fa-edit', 'hint': gettext('Edit notice'), 'href': '/admin/notices/edit/' + item.notice_id},
                {'text': gettext('Clone'), 'icon': 'fa-copy', 'hint': gettext('Clone notice'), 'click': 'ctrl.clone(item)'},
                {'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this notice'), 'click': 'item.removeConfirm("Removed")'},
            ];

            this.$ui.bottomSheet(actions, gettext('Actions for: ') + item.name, this.$scope, {item: item, ctrl: this});
        };

        clone = (notice) => {
            let gettext = this.gettext;
            this.$ui.prompt(gettext('Enter new name'), gettext('new-name')).then(function (name) {
                notice.clone().attr('name', name).save(gettext('Notice duplicated'));
            });
        }
    }

    angular.module('noticeListApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('noticeListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeListController]);
}

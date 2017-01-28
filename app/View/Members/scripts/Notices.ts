/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class NoticeListController {
        private marked = false;

        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }

        seen = (notice) => {
            if (!this.marked) {
                this.marked = true;
                notice.attr('seen', true).save();
            }
        };

        actions = (item) => {
            let gettext = this.gettext;
            let actions = [
                {'text': gettext('Details..'), 'icon': 'fa-eye', 'hint': gettext('View more details'), 'href': '/members/notices/view/' + item.notice_id},
                {'text': gettext('Remove'), 'icon': 'fa-trash', 'hint': gettext('Delete this notice'), 'click': 'item.removeConfirm("Removed")'},
            ];

            this.$ui.bottomSheet(actions, this.gettext('Actions for this notice'), this.$scope, {item: item, ctrl: this});
        };
    }

    angular.module('noticeListApp', ['MinuteFramework', 'MembersApp', 'gettext'])
        .controller('noticeListController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeListController]);
}

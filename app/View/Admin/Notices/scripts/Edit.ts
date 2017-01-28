/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class NoticeEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.notice = $scope.notices[0] || $scope.notices.create().attr('class', 'default');
            $scope.notice.links_json = $scope.links = $scope.notice.links_json || [];
        }

        save = () => {
            this.$scope.notice.save(this.gettext('Notice saved successfully'));
        };
    }

    angular.module('noticeEditApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('noticeEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeEditController]);
}

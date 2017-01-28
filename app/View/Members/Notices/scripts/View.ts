/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class NoticeEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.notice = $scope.notices[0];

            $timeout(() => $scope.notice.attr('seen', true).save());
        }
    }

    angular.module('noticeEditApp', ['MinuteFramework', 'MembersApp', 'gettext'])
        .controller('noticeEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', NoticeEditController]);
}
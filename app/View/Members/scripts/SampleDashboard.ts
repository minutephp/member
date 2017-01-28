/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module Admin {
    export class DashboardEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog, public $youtube: any) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');

            $scope.defaults = {
                create: {label: 'Create', label2: 'Create project'},
                video: {blurb: '<i class="fa fa-youtube-play"></i> Get started quickly by watching this small video tutorial.'},
                alert: {heading: 'Hi there!', html: '<a href="">Click here to watch a small video!</a>'},
                heading: {html: 'Welcome %session.user.first_name%, how are you today?'},
                manual: {text: '<i class="fa fa-book text-danger"></i> Download manual'}
            };

            $scope.settings = $scope.configs[0] ? $scope.configs[0].attr('data_json') : {};

            let wow = window['WOW'];
            if (wow && !$scope.settings.noAnimate) {
                new wow().init();
            }
        };

        inject = (sidebar, html) => { //workaround ngSanitize
            this.$timeout(() => angular.element(sidebar).html(html));
        };

        expired = (days) => {
            if (days > 0) {
                let moment = window['moment'];
                let elapsed = moment().diff(moment(this.$scope.session.user.created_at), 'days');

                return elapsed > days;
            }
        };

        isVisible = (levels) => {
            let groups = this.$scope.session.user.groups;
            return groups && levels ? _.intersection(groups, levels.split(/,\s*/)).length > 0 : true;
        };
    }

    angular.module('dashboardEditApp', ['MinuteFramework', 'MembersApp', 'AngularYouTubePopup', 'gettext'])
        .controller('dashboardEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', '$youtube', DashboardEditController]);
}

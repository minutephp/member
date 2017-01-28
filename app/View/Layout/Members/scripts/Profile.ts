/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module App {
    export class ProfileController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.data = {tabs: []};
            $scope.$watch('data.tabs', (tabs) => {
                if (tabs && tabs.length > 0) {
                    this.makeTabs(tabs);
                }
            });
        };

        makeTabs = (tabs) => {
            let tabHolder = $('#tabs');
            let html = `<ul class="nav nav-tabs" role="tablist">`;

            tabs.sort((a, b) => (parseInt(a.priority) || 0) - (parseInt(b.priority) || 0));

            angular.forEach(tabs, function (tab) {
                let tabClass = (tab.href || '').toLowerCase() === location.pathname.toLowerCase() ? 'active' : '';
                html += `<li class="${tabClass}"><a href="${tab.href}"><i class="fa fa-fw ${tab.icon}"></i> ${tab.label}</a></li>`;
            });

            tabHolder.html(html + `</ul>`);
        };
    }

    angular.module('ProfileApp', ['MinuteFramework', 'gettext'])
        .controller('ProfileController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', ProfileController]);
}

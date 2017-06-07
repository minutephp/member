/// <reference path="E:/var/Dropbox/projects/siteexplainer/public/static/bower_components/minute/_all.d.ts" />

module App {
    export class AccountEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService, public $http: ng.IHttpService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }

        passwordPopup = () => {
            let save = (data) => {
                if (data && data.password && data.password2 && (data.password == data.password2)) {
                    this.$http.post('/members/update-password', data)
                        .then((pass) => {
                            this.$ui.toast('Password updated successfully!', 'success');
                            this.$ui.closePopup();
                        })
                        .catch((fail) => {
                            this.$ui.toast(fail.data || 'Wrong password', 'error');
                        });
                }
            };

            this.$ui.popupUrl('/password-popup.html', false, null, {ctrl: this, data: {}, save: save});
        };

        cancel = () => {
            this.$ui.confirm('<b>This is an irreversible action!</b> You will lose all data associated with this account.', "I'm sure :(", "Cancel").then(() => {
                this.$http.post('/members/cancel-account', {}).then(() => top.location.href = '/?message=Account+deleted');
            });
        }
    }

    angular.module('accountEditApp', ['MinuteFramework', 'gettext'])
        .controller('accountEditController', ['$scope', '$minute', '$ui', '$timeout', '$http', 'gettext', 'gettextCatalog', AccountEditController]);
}

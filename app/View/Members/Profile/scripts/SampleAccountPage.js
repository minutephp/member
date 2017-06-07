/// <reference path="E:/var/Dropbox/projects/siteexplainer/public/static/bower_components/minute/_all.d.ts" />
var App;
(function (App) {
    var AccountEditController = (function () {
        function AccountEditController($scope, $minute, $ui, $timeout, $http, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.$http = $http;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.passwordPopup = function () {
                var save = function (data) {
                    if (data && data.password && data.password2 && (data.password == data.password2)) {
                        _this.$http.post('/members/update-password', data)
                            .then(function (pass) {
                            _this.$ui.toast('Password updated successfully!', 'success');
                            _this.$ui.closePopup();
                        })
                            .catch(function (fail) {
                            _this.$ui.toast(fail.data || 'Wrong password', 'error');
                        });
                    }
                };
                _this.$ui.popupUrl('/password-popup.html', false, null, { ctrl: _this, data: {}, save: save });
            };
            this.cancel = function () {
                _this.$ui.confirm('<b>This is an irreversible action!</b> You will lose all data associated with this account.', "I'm sure :(", "Cancel").then(function () {
                    _this.$http.post('/members/cancel-account', {}).then(function () { return top.location.href = '/?message=Account+deleted'; });
                });
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
        }
        return AccountEditController;
    }());
    App.AccountEditController = AccountEditController;
    angular.module('accountEditApp', ['MinuteFramework', 'gettext'])
        .controller('accountEditController', ['$scope', '$minute', '$ui', '$timeout', '$http', 'gettext', 'gettextCatalog', AccountEditController]);
})(App || (App = {}));

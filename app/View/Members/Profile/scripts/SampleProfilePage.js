/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var Admin;
(function (Admin) {
    var ProfileEditController = (function () {
        function ProfileEditController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            var _this = this;
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            this.indexOf = function (key) {
                for (var i = 0; i < _this.$scope.user.data.length; i++) {
                    if (_this.$scope.user.data[i].key == key) {
                        return i;
                    }
                }
                return _this.$scope.user.data.create().attr('key', key);
            };
            this.update = function () {
                var attrs = _this.$scope.user.getAttributes();
                var update = { user: angular.extend({}, attrs, { full_name: attrs['first_name'] + ' ' + attrs['last_name'] }) };
                _this.$scope.session.update(update);
            };
            this.save = function () {
                _this.$scope.user.save(_this.gettext('Profile updated successfully')).then(function () {
                    _this.$scope.user.data.saveAll();
                    _this.update();
                });
            };
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.user = $scope.users[0];
        }
        return ProfileEditController;
    }());
    Admin.ProfileEditController = ProfileEditController;
    angular.module('profileEditApp', ['MinuteFramework', 'MembersApp', 'MinuteAddons', 'gettext'])
        .controller('profileEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', ProfileEditController]);
})(Admin || (Admin = {}));

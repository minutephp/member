/// <reference path="../../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module Admin {
    export class ProfileEditController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            $scope.user = $scope.users[0];
        }

        indexOf = (key) => {
            for (let i = 0; i < this.$scope.user.data.length; i++) {
                if (this.$scope.user.data[i].key == key) {
                    return i;
                }
            }

            return this.$scope.user.data.create().attr('key', key);
        };

        update = () => {
            let attrs = this.$scope.user.getAttributes();
            let update = {user: angular.extend({}, attrs, {full_name: attrs['first_name'] + ' ' + attrs['last_name']})};

            this.$scope.session.update(update);
        };

        save = () => {
            this.$scope.user.save(this.gettext('Profile updated successfully')).then(() => {
                this.$scope.user.data.saveAll();
                this.update();
            });
        };
    }

    angular.module('profileEditApp', ['MinuteFramework', 'MembersApp', 'MinuteAddons', 'gettext'])
        .controller('profileEditController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', ProfileEditController]);
}

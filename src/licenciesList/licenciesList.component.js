export const LicenciesList = {
    bindings: {
        licencies: '<'
    },
    template: require('./licenciesList.html'),
    controller: class {
        /** @ngInject */
        constructor(LicencieService) {
            this.LicencieService = LicencieService;
        }
        $onInit() {
            this.propertyName = 'nom';
            this.reverse = false;


        };
        sortBy(propertyName) {
            this.reverse = (this.propertyName === propertyName) ? !this.reverse : false;
            this.propertyName = propertyName;
        }
    }
}
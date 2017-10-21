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
            this.licencies.forEach(licencie => {
                licencie.progression = licencie.point - licencie.debut;
            });
            this.propertyName = 'nom';
            this.reverse = true;


        };
        sortBy(propertyName) {
            this.reverse = (this.propertyName === propertyName) ? !this.reverse : false;
            this.propertyName = propertyName;
        }
    }
}
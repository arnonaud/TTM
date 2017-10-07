export const LicenciesList = {
    bindings:{
        licencies: '<'
    },
    template: require('./licenciesList.html'),
    controller: class {
        /** @ngInject */
        constructor(LicencieService){
            this.LicencieService = LicencieService;
        }
        $onInit(){
            this.licenciesInfos = [];
            this.licencies.forEach(licencie => {
                this.LicencieService.getLicencie(licencie.licence)
                .then(response => {
                    response.progression = (response.apoint - response.valcla).toFixed(2);
                    this.licenciesInfos.push(response);
                });
            });
        }
    }
}
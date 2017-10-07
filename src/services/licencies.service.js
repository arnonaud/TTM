class LicencieService {
    /** @ngInject */
    constructor($http) {
        this.http = $http;
    }
    getLicencies() {

        return this.http.get("http://localhost/TTM/src/back/licencies.php")
                .then(response => response.data);
    }
   
    getLicencie(numLicence) {
        return this.http.get("http://localhost/TTM/src/back/licencie.php?licence="+numLicence)
                .then(response => response.data);
    }
   
}

export default LicencieService;

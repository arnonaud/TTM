class LicencieService {
    /** @ngInject */
    constructor($http) {
        this.http = $http;
    }
    getLicencies() {

        return this.http.get("http://localhost/TTM/src/back/rest/licencies.php")
                .then(response => {
                   console.log(response);
                    return response.data;
                });
    }
   
    getLicencie(numLicence) {
        return this.http.get("http://localhost/TTM/src/back/rest/licencie.php?licence="+numLicence)
                .then(response => response.data);
    }
   
}

export default LicencieService;

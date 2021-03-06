class LicencieService {
    /** @ngInject */
    constructor($http) {
        this.http = $http;
    }
    getLicencies() {

        return this.http.get("http://localhost/TTM/src/back/licencies/licencies.php")
                .then(response => {
                   console.log(response);
                    return response.data;
                });
    }
   
    getLicencie(numLicence) {
        return this.http.get("http://localhost/TTM/src/back/rest/licencie.php?licence="+numLicence)
                .then(response => response.data);
    }

    getJoueurparties(numLicence) {
        return this.http.get("http://localhost/TTM/src/back/rest/joueurs_parties.php?licence="+numLicence)
        .then(response => response.data);
    }
   
}

export default LicencieService;

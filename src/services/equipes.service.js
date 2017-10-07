class EquipeService {
    /** @ngInject */
    constructor($http) {
        this.http = $http;
    }
    getEquipesMasculine() {
        return this.http.get("http://localhost/TTM/src/back/equipes_masculine.php")
                .then(response => response.data);
    }
    getEquipesFeminine() {
        return this.http.get("http://localhost/TTM/src/back/equipes_feminine.php")
                .then(response => response.data);
    }
    getEquipesAutres() {
        return this.http.get("http://localhost/TTM/src/back/equipes_autres.php")
        .then(response => response.data);
    }

    getPouleClassement(divisionId, pouleId) {
        return this.http.get("http://localhost/TTM/src/back/equipe_detail.php?division="+divisionId+"&poule="+pouleId)
        .then(response => response.data);
    }

    getPouleRencontres(divisionId, pouleId) {
        return this.http.get("http://localhost/TTM/src/back/equipe_rencontre.php?division="+divisionId+"&poule="+pouleId)
        .then(response => response.data);
    }
}

export default EquipeService;

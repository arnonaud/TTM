export const EquipeDetail = {
    bindings:{
        equipes: '<',
        rencontres: '<'
    },
    template: require('./equipeDetail.html'),
    controller: class {
        constructor(){}
        $onInit(){
            const dates = [];
            this.rencontres.forEach(rencontre => {
                if(!dates.some(date => date === rencontre.dateprevue)) {
                    dates.push(rencontre.dateprevue);
                }
            });
            this.rencontesByDates = [];
            dates.forEach(date => {
                this.rencontesByDates.push(this.rencontres.filter(rencontre => rencontre.dateprevue === date));
            });
            console.log(this.rencontesByDates); 
        }
    }
}
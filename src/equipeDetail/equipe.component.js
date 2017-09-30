export const EquipeDetail = {
    bindings:{
        equipes: '<'
    },
    template: require('./equipeDetail.html'),
    controller: class {
        constructor(){}
        $onInit(){
            console.log(this.equipes)
        }
    }
}
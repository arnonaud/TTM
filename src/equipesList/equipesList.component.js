export const EquipesList = {
    bindings:{
        masculine: '<',
        feminine: '<',
        autres: '<'
    },
    template: require('./equipesList.html'),
    controller: class {
        /** @ngInject */
        constructor($http){
            this.http = $http;
        }
        $onInit(){
            console.log(this.masculine);
            console.log(this.feminine);
            console.log(this.autres);
        }
    }
}
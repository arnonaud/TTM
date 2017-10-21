export const EquipesList = {
    bindings:{
        masculine: '<',
        feminine: '<',
        autres: '<'
    },
    template: require('./equipesList.html'),
    controller: class {
        $onInit() {
            console.log(this.masculine);
        }
    }
}
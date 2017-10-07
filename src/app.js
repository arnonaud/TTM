import angular from 'angular';
import uiRouter from '@uirouter/angularjs';
import {Header} from './header/header.component';
import {Home} from './home/home.component';
import {EquipesList} from './equipesList/equipesList.component';
import {EquipeDetail} from './equipeDetail/equipeDetail.component';

import EquipeService from './services/equipes.service';

let app = angular.module('app', ['ui.router']);

app.component('header', Header)
   .component('home', Home)
   .component('equipesList', EquipesList)
   .component('equipeDetail', EquipeDetail)
   .service('EquipeService', EquipeService)

app.config($stateProvider => {
  const homeState = {
    name: 'home',
    url: '/home',
    component: 'home'
  }
  
  const equipesListState = {
    name: 'equipesList',
    url: '/equipes',
    component: 'equipesList',
    resolve: {
      /** @ngInject */
      masculine: EquipeService => EquipeService.getEquipesMasculine(),
      /** @ngInject */
      feminine: EquipeService => EquipeService.getEquipesFeminine(),
      /** @ngInject */
      autres: EquipeService => EquipeService.getEquipesAutres(),
    }
  }

  const equipeDetailState = {
    name: 'equipeDetail',
    url: '/equipe?division&poule',
    component: 'equipeDetail',
    resolve: {
      /** @ngInject */
      equipes: ($stateParams, EquipeService) => EquipeService.getPouleClassement($stateParams.division, $stateParams.poule),
      /** @ngInject */
      rencontres: ($stateParams, EquipeService) => EquipeService.getPouleRencontres($stateParams.division, $stateParams.poule)
    }
  }
  
  $stateProvider.state(homeState);
  $stateProvider.state(equipesListState);
  $stateProvider.state(equipeDetailState);
});

app.run(() => {

  console.log('TTM');
})
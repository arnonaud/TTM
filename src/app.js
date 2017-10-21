import angular from 'angular';
import uiRouter from '@uirouter/angularjs';
import {Header} from './header/header.component';
import {Home} from './home/home.component';
import {EquipesList} from './equipesList/equipesList.component';
import {EquipeDetail} from './equipeDetail/equipeDetail.component';
import {LicenciesList} from './licenciesList/licenciesList.component';
import {LicencieDetail} from './licencieDetail/licencieDetail.component';

import EquipeService from './services/equipes.service';
import LicencieService from './services/licencies.service';

let app = angular.module('app', ['ui.router']);

app.component('header', Header)
   .component('home', Home)
   .component('equipesList', EquipesList)
   .component('equipeDetail', EquipeDetail)
   .component('licenciesList', LicenciesList)
   .component('licencieDetail', LicencieDetail)
   .service('EquipeService', EquipeService)
   .service('LicencieService', LicencieService)

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

  const licenciesListState = {
    name: 'licenciesList',
    url: '/licencies',
    component: 'licenciesList',
    resolve: {
      /** @ngInject */
      licencies: LicencieService => LicencieService.getLicencies()
    }
  }

  const licencieDetailState = {
    name: 'licencie',
    url: '/licencie?numLicence',
    component: 'licencieDetail',
    resolve: {
      /** @ngInject */
      licencie: ($stateParams, LicencieService) => LicencieService.getLicencie($stateParams.numLicence),
      /** @ngInject */
      parties: ($stateParams, LicencieService) => LicencieService.getJoueurparties($stateParams.numLicence)
    }
  }
  
  $stateProvider.state(homeState);
  $stateProvider.state(equipesListState);
  $stateProvider.state(equipeDetailState);
  $stateProvider.state(licenciesListState);
  $stateProvider.state(licencieDetailState);
});

app.run(() => {

  console.log('TTM');
})
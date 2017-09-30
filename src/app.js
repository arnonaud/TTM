import angular from 'angular';
import uiRouter from '@uirouter/angularjs';
import state from './state.js'
import {Header} from './header/header.component'
import {Home} from './home/home.component'

let app = angular.module('app', ['ui.router']);

app.component('header', Header)
   .component('home', Home)

app.config(($stateProvider, $urlServiceProvider) => {
    $urlServiceProvider.rules.otherwise({ state: 'home' });
    
    $stateProvider.state('home', {
      url: '/home',
      component: 'home'
    });
  })

app.run(() => {
  console.log('TTM !');
})
"use strict"
import Worker from './Worker.js';
import Department from './Department.js';
import  Routing from '../js/Routing.js';
import Route from './Route.js';

const $root = $('#root');
const routing = new Routing();

routing.addRoute(new Route("/workers/show", new Worker($root)));
routing.addRoute(new Route("/departments/show", new Department($root)));
routing.addRoute(new Route("/departments/:id/show", new Department($root)));
routing.onLoad("/workers/show",new Worker($root));
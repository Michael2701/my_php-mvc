"use strict"
import jquery from './../node_modules/jquery/dist/jquery.min.js';
import {} from './../node_modules/bootstrap/dist/js/bootstrap.min.js';
import Mustache from './../node_modules/mustache/mustache.min.js';
import Worker from './modules/Worker.js';
import Department from './modules/Department.js';
import DepartmentUpdate from './modules/DepartmentUpdate.js';
import Routing from './core/Routing.js';
import Route from './core/Route.js';

const $root = $('#root');
const routing = new Routing();

routing.addRoute(new Route("/workers/show", Worker, $root));
routing.addRoute(new Route("/departments/show", Department, $root));
routing.addRoute(new Route("/departments/:id/update/:id", DepartmentUpdate, $root));
routing.onLoad("/workers/show",new Worker($root));

import ClassInterface from './ClassInterface.js';

export default class DepartmentUpdate extends ClassInterface{
    constructor(root, matches = null){
        super();
        this.root = root;
        this.matches = matches;
    }
    onLoad = () => {
        this.root.html(`<h1>Department ${this.matches[1]} update</h1>`);
    }    
}
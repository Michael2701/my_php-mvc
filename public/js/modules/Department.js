import ClassInterface from './ClassInterface.js';

export default class Department extends ClassInterface{
    constructor(root, matches = null){
        super();
        this.root = root;
        this.matches = matches;
    }
    onLoad = () => {
        this.root.html("<h1>Department</h1>");
    }    
}
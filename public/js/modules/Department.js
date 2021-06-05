import ClassInterface from './ClassInterface.js';
import { tmpl } from './DepartmentsTmpl.js'; 

export default class Department extends ClassInterface{
    constructor(root, matches = null){
        super();
        this.root = root;
        this.matches = matches;
        this.titles = {id:"ID", name:"Name", desc:"Description"};
    }
    
    onLoad = () => {
        $.get({
            url: '/departments/show',
            success: res => {
                const departments = JSON.parse(res);
                var output = Mustache.render(tmpl, {departments, titles: this.titles});
                this.root.html(output);
            },
            error: err => {
                console.log(err);
            }
        });
    }    
}
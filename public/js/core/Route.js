export default class Route{
    constructor(path, cls, root){
        this.path = path;
        this.root = root;
        this.matcher = new RegExp(this.path.replace(/:[^\s/]+/g, '([\\w-]+)'));
        this.cls = cls;
    }

    onPathMatch = (matches) => {
        (new this.cls(this.root, matches)).onLoad();
    }

    getMatcher = () => {
        return this.matcher;
    }

    getPath = () => {
        return this.path;
    }

    setPath = (path) => {
        this.path = path;
    }
}
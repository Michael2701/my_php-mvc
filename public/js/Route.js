export default class Route{
    constructor(path, cls){
        this.path = path;
        this.matcher = new RegExp(this.path.replace(/:[^\s/]+/g, '([\\w-]+)'));
        this.cls = cls;
    }

    onPathMatch = (matches) => {
        this.cls.onLoad(matches);
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
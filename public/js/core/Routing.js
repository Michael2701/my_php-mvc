export default class Routing{
    
    constructor(){
        this.matches = [];
        this.routes = [];
        window.addEventListener("hashchange", this.locationHashChanged);
    }

    addRoute = route =>{
        this.routes.push(route);
    }
    
    locationHashChanged = () => {
        this.path = window.location;
        
        this.match = this.routes.filter(route => {
            this.matches = this.path.hash.substring(1).match(route.getMatcher()); 
            return this.matches;
        });

        try{
            this.matches.shift();
            delete this.matches['index'];
            delete this.matches['input'];
            delete this.matches['groups'];
        }
        catch(Exception){}

        if(this.match.length > 0) this.match[0].onPathMatch(this.matches);
    }

    onLoad = (hash,cls) => {
        window.location.hash = `#${hash}`;
        cls.onLoad();
    }

    routesList = () => {

    }
}
export default class ClassInterface{
    onLoad() { this._WARNING('onLoad()'); }

    _WARNING(fName='unknown method') {
        console.warn('WARNING! Function "'+fName+'" is not overridden in '+this.constructor.name);
    }
}
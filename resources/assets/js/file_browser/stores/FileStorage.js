'use strict';

import Dispatcher from '../../AppDispatcher'
import FileConstants from '../constants/FileConstants'
import {EventEmitter} from 'events';
import assign from 'object-assign'
import BaseStore from  '../../BaseStore'

let CHANGE_EVENT = 'change',
    _files = [],
    _path = "/";

/**
 * Set the values for categories that will be used
 * with components.
 */
function setFiles (files) {
  _files = files;
}
function setCurrentDir(path){
  _path = path;
}
/*class FileStorage extends BaseStore{

}*/
class FileStorage extends BaseStore {

    constructor() {
        super();
        this.subscribe(() => this._registerToActions.bind(this))
        this._files = [];
        this._path = FileConstants.ROOT_DIR;
    }

    _registerToActions(payload) {
        var action = payload.action || payload;

        switch (action.actionType) {
            case FileConstants.RECEIVE_FILES:
                this._files = action.files;
                this._path = action.path;
                break;
            case FileConstants.CHANGE_DIRECTORY:
                this._files = action.files;
                this._path = action.path;
                break;
            case FileConstants.ADD_DIRECTORY:
                this._files = action.files;
                this._path = action.path;
                break;
            case FileConstants.GOT_DIRECTORY_CONTENT:
                this._files = action.files;
                this._path = action.path;
                break;
            default:
                return true;
        }
        this.emitChange();
        return true;
    }


  /**
   * Return the value for categories.
   */
  getFiles () {
      /*console.log("files from storage")
      console.log(this._files)*/
    return this._files;
  }
  getState(){
    return {files:this.getFiles(),path:this.getCurrentPath()}
  }
  getCurrentPath(){
    return this._path;
  }
  getCurrentFolderContent(){
    return this.getFiles();
  }
  getRootFolderContent(){
    return this.getFiles();
  }
}

/*FileStorage.dispatchToken = Dispatcher.register(function (payload) {

});*/

module.exports = new FileStorage();
export default new FileStorage();

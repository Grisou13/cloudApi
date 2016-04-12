'use strict';

import Dispatcher from '../../AppDispatcher'
import FileConstants from '../constants/FileConstants'
import {EventEmitter} from 'events';
import assign from 'object-assign'

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
var FileStorage = assign({}, EventEmitter.prototype, {

  /**
   * Emits change event.
   */
  emitChange: function () {
    this.emit(CHANGE_EVENT);
  },

  /**
   * Adds a change listener.
   *
   * @param {function} callback Callback function.
   */
  addChangeListener: function (callback) {
    this.on(CHANGE_EVENT, callback);
  },

  /**
   * Removes a change listener.
   *
   * @param {function} callback Callback function.
   */
  removeChangeListener: function (callback) {
    this.removeListener(CHANGE_EVENT, callback);
  },

  /**
   * Return the value for categories.
   */
  getFiles: function () {
    return _files;
  },
  getState(){
    return {files:this.getFiles(),path:this.getCurrentPath()}
  },
  getCurrentPath: function(){
    return _path;
  },
  getCurrentFolderContent: function(){
    return this.getFiles();
  },
  getRootFolderContent:function(){
    return this.getFiles();
  }
});

FileStorage.dispatchToken = Dispatcher.register(function (payload) {
  var action = payload.action || payload;

  switch (action.actionType) {
    case FileConstants.RECEIVE_FILES:
        setCurrentDir(action.path);
        setFiles(action.files);
        break;
    case FileConstants.CHANGE_DIRECTORY:
        setCurrentDir(action.path);
        setFiles(action.files);
        break;
    case FileConstants.ADD_DIRECTORY:
        setCurrentDir(action.path);
        setFiles(action.files);
        break;
    case FileConstants.GOT_DIRECTORY_CONTENT:
        setFiles(action.files);
        setCurrentDir(action.path);
        break;
    default:
      return true;
  }
  FileStorage.emitChange();
  return true;
});

module.exports = FileStorage;

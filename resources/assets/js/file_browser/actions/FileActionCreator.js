'use strict';
/**
 * Dispatcher for actions happening in the service or components
 */
var Dispatcher = require('../../AppDispatcher');
var FileConstants = require('../constants/FileConstants');

class FileCreator {
  /**
   *
   *
   */
  /*getBase() {
    this.getFolderContent(FileConstants.ROOT);//the base is /
  }
  getRoot(){
    this.getFolderContent(FileConstants.ROOT);//the base is /
  }*/
  static gotFolderContent(path,files){

    Dispatcher.handleViewAction({
      actionType: FileConstants.GOT_DIRECTORY_CONTENT,
      files: files,
      path:path
    });
  }
  static gotApiError(message,errors){
    Dispatcher.handleViewAction({
      actionType: FileConstants.RECEIVE_ERROR,
      error: message,
      errors:errors
    });
  }
  static gotFileContent(path,content){
    Dispatcher.handleViewAction({
      actionType:FileConstants.RECEIVE_FILE_CONTENT,
      file:path,
      data:content
    });
  }
  /*getFileContent(path){}
  uploadFile(file,filepath){}
  createFolder(path){
    //when adding a foiolder and getting a positiv response from the api, we just append the new folder to the folders

    Api
      .post("/",{"path":path,"addDir":true})
      .then(function(res){
        var files = Store.getFiles();
        files.push(res.file)
        Dispatcher.handleViewAction({
          actionType: FileConstants.ADD_DIRECTORY,
          path: path,
          files: files
        });
      })
      .catch(function(error){
        Dispatcher.handleViewAction({
          actionType: FileConstants.RECEIVE_ERROR,
          error: res.body.message,
          errors: res.body.errors
        });
      });
  }*/
}
module.exports = FileCreator;
export default FileCreator;

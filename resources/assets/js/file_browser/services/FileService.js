//import request from 'reqwest';
//import when from 'when';
//import {QUOTE_URL} from '../constants/QuoteConstants';
//import QuoteActions from '../actions/QuoteActions';
//import LoginStore from '../../main/stores/LoginStore';
import Api from '../../Api'
import FileActions from '../actions/FileActionCreator'
import {GET_TREE} from '../constants/FileConstants'

class FileService {
    getFolderContent(path){
      console.log(path);
        Api
            .get(GET_TREE,{'path':path})//should but the user token in here somewhere
            .then(function (data) {
              console.log(data);
                FileActions.gotFolderContent(path,data)
            })
            .catch(function (data) {
                FileActions.gotApiError(data.message)
            });

    }
    getFileContent(path){
      return false
    }
    createDirectory(fullPath){
      return false
    }
    uploadFile(path,file){
      return false
    }
    /*nextQuote() {
        request({
            url: QUOTE_URL,
            method: 'GET',
            crossOrigin: true,
            headers: {
                'Authorization': 'Bearer ' + LoginStore.jwt
            }
        })
            .then(function(response) {
                QuoteActions.gotQuote(response);
            });
    }*/

}

export default new FileService()

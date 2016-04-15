//import request from 'reqwest';
//import when from 'when';
//import {QUOTE_URL} from '../constants/QuoteConstants';
//import QuoteActions from '../actions/QuoteActions';
//import LoginStore from '../../main/stores/LoginStore';
import Api from '../../Api'
import FileCreator from '../actions/FileActionCreator'
import {GET_TREE} from '../constants/FileConstants'

class FileService {
    getFolderContent(path){
        Api
            .get(GET_TREE,{'path':path})//should but the user token in here somewhere
            .then(function (data) {
                let files = data.children.concat(data.files);
                FileCreator.gotFolderContent(path,files)
            })
            .catch(function (data) {
                FileCreator.gotApiError(data.message)
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

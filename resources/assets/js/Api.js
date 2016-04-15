'use strict';

import request from 'superagent'
import {Promise} from 'es6-promise'// jshint ignore:line
import API_CONSTANTS,{BASE_URL} from "./ApiConstants.js"
import LoginStore from './main/stores/LoginStore'
import AuthService from './main/services/AuthService'
/**
 * Wrapper for calling a API
 */
//let headers;
let store = LoginStore


class Api
{
  static getHeaders(){
    let jwt = LoginStore.getJwt()
    let headers = {'Authorization' : `Bearer  ${jwt}` }
    return headers
  }
  static get(url,data = {},files = {}) {
    return new Promise(function (resolve, reject) {
      request
        .get(url)
        .query(data)
        //.attach(files)
        .type("json")
        .set(Api.getHeaders())
        .end(function (err,res) {
          console.log(res);

          if(err){
            console.log(err);
            reject(res);
          }
          if (res.status === 404 || res.status == 403) {
            reject(res);
          }

          else if(res.status === 401 && res.body.message === "Token has expired"){
            AuthService.refreshToken()
            Api.get(url,data,files);//rerun the query with the new jwt
          }
          else {
            if(res.body.status == API_CONSTANTS.STATUS_OK){
              resolve(res.body.payload);
            } else {
              reject(res);
            }
          }
        });
    });
  }
  static post(url,data = {},files = {}){

    return new Promise(function(resolve,reject){
      request
      .post(url)
      .send(data)
      //.attach(files)
      .type("json")
      .set(Api.getHeaders())
      .end(function (err,res) {
        console.log(res);

        if(err){
          console.log(err);
          reject(res);
        }

        if (res.status === 404 || res.status == 403) {
          reject(res);
        }
        else if(res.status === 401)
        {
          if(res.body.message === "The token has been blacklisted")
              AuthService.logout();
          if(res.body.message === "Token has expired")
          {
            AuthService.refreshToken(LoginStore.getJwt())//refresh the token
            Api.post(url,data,files);//rerun the query with the new jwt
          }
        }
        else {
          if(res.body.status == API_CONSTANTS.STATUS_OK){
            resolve(res.body.payload);
          } else {
            reject(res);
          }
        }
      });
    });
  }
}

module.exports = Api;
// var BASE_URL = 'localhost:8600';
// var TIMEOUT = 10000;
//
// var _pendingRequests = {};
//
//
// function abortPendingRequests(key) {
//     if (_pendingRequests[key]) {
//         _pendingRequests[key]._callback = function(){};
//         _pendingRequests[key].abort();
//         _pendingRequests[key] = null;
//     }
// }
//
// function token() {
//     return UserStore.getState().token;
// }
//
// function makeUrl(part) {
//     return API_URL + part;
// }
//
// function dispatch(key, response, params) {
//     var payload = {actionType: key, response: response};
//     if (params) {
//         payload.queryParams = params;
//     }
//     AppDispatcher.handleRequestAction(payload);
// }
//
// // return successful response, else return request Constants
// function makeDigestFun(key, params) {
//     return function (err, res) {
//         if (err && err.timeout === TIMEOUT) {
//             dispatch(key, Constants.request.TIMEOUT, params);
//         } else if (res.status === 400) {
//             UserActions.logout();
//         } else if (!res.ok) {
//             dispatch(key, Constants.request.ERROR, params);
//         } else {
//             dispatch(key, res, params);
//         }
//     };
// }
//
// // a get request with an authtoken param
// function get(url) {
//     return request
//         .get(url)
//         .timeout(TIMEOUT);
//         //.query({authtoken: token()});//save for later
// }
//
// var Api = {
//     getList: function(path = "/") {
//         var url = makeUrl("?path" + path);
//         var key = Constants.api.GET_ENTITY_DATA;
//         var params = {entityId: entityId};
//         abortPendingRequests(key);
//         dispatch(key, Constants.request.PENDING, params);
//         _pendingRequests[key] = get(url).end(
//             makeDigestFun(key, params)
//         );
//     }
// };
//
// module.exports = Api;

'use strict';

import request from 'superagent'
import {Promise} from 'es6-promise'// jshint ignore:line
import API_CONSTANTS,{BASE_URL} from "./ApiConstants.js"
import LoginStore from './main/stores/LoginStore'
/**
 * Wrapper for calling a API
 */
//let headers;
let store = LoginStore;
console.log(store.isLoggedIn());
console.log(LoginStore.isLoggedIn());
//if(LoginStore.jwt !== null)
let jwt = localStorage.getItem('jwt');
let headers = {'Authorization' : `Bearer  ${jwt}` };
console.log(headers);

var Api = {
  get: function (url,data = {},files = {}) {
    return new Promise(function (resolve, reject) {
      request
        .get(url)
        .query(data)
        //.attach(files)
        .type("json")
        .set(headers)
        .end(function (err,res) {
          console.log("==== getting some data ====")
          console.log(res);
          console.log(err);
          if(err){
            reject(res);
          }
          if (res.status === 404) {
            reject(res);
          } else {
            if(res.body.status == API_CONSTANTS.STATUS_OK){
              resolve(res.body.payload);
            } else {
              reject(res);
            }
          }
        });
    });
  },
  post:function(url,data = {},files = {}){

    return new Promise(function(resolve,reject){
      request
      .post(url)
      .send(data)
      //.attach(files)
      .type("json")
      .set(headers)
      .end(function (err,res) {
        console.log("======== finish posting ======")
        console.log(res);
        console.log(err);
        if(err){
          reject(res);
        }
        if (res.status === 404) {
          reject(res);
        } else {
          if(res.body.status == API_CONSTANTS.STATUS_OK){
            resolve(res.body.payload);
          } else {
            reject(res);
          }
        }
      });
    });
  }
};

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

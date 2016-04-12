import AppDispatcher from '../../AppDispatcher';
import {LOGIN_USER, LOGOUT_USER} from '../constants/LoginConstants';
//import RouterContainer from '../services/RouterContainer'
import {hashHistory} from 'react-router'
export default {
  loginUser: (jwt) => {
    var savedJwt = localStorage.getItem('jwt');
    AppDispatcher.dispatch({
      actionType: LOGIN_USER,
      jwt: jwt
    });

    if (savedJwt !== jwt) {
      /*var nextPath = RouterContainer.get().getCurrentQuery().nextPath || '/';

      RouterContainer.get().transitionTo(nextPath);*/
      hashHistory.push("/home");
      localStorage.setItem('jwt', jwt);
    }
  },
  logoutUser: () => {

    localStorage.removeItem('jwt');
    AppDispatcher.dispatch({
      actionType: LOGOUT_USER
    });
    hashHistory.push('/login');
  }
}

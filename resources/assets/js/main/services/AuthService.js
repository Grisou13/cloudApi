import Api from '../../Api';
import {LOGIN_URL, SIGNUP_URL} from '../constants/LoginConstants';
import LoginActions from '../actions/LoginActions';

class AuthService {

  login(username, password) {
    return this.handleAuth(Api.post(LOGIN_URL,{login:username,password:password}));
  }

  logout() {
    LoginActions.logoutUser();
  }

  signup(username, password, email) {
    return this.handleAuth(Api.post(SIGNUP_URL,{username:username,password:password,email:email}));
  }

  handleAuth(loginPromise) {
    return loginPromise
      .then(function(response) {
        var jwt = response.token;
        LoginActions.loginUser(jwt);
        return true;
      });
  }
}

export default new AuthService()

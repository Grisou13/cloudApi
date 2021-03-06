import React from 'react';
import ReactMixin from 'react-mixin';
import Auth from '../services/AuthService'
import LinkedStateMixin from 'react-addons-linked-state-mixin'
import { history } from 'react-router'

export default class Signup extends React.Component {

  constructor() {
    super()
    this.state = {
      user: '',
      password: '',
      email: ''
    };
  }

  signup(e) {
    e.preventDefault();
    Auth.signup(this.state.user, this.state.password, this.state.extra)
      .catch(function(err) {
        alert("There's an error logging in");
        console.log("Error logging in", err);
      });
      //history.go("/home");
  }

  render() {
    return (
      <div className="login jumbotron center-block">
        <h1>Signup</h1>
        <form role="form">
        <div className="form-group">
          <label htmlFor="username">Username</label>
          <input type="text" valueLink={this.linkState('user')} className="form-control" id="username" placeholder="Username" />
        </div>
        <div className="form-group">
          <label htmlFor="password">Password</label>
          <input type="password" valueLink={this.linkState('password')} className="form-control" id="password" ref="password" placeholder="Password" />
        </div>
        <div className="form-group">
          <label htmlFor="extra">Email</label>
          <input type="text" valueLink={this.linkState('email')} className="form-control" id="email" ref="email" placeholder="some.email@thing.com" />
        </div>


        <button type="submit" className="btn btn-default" onClick={this.signup.bind(this)}>Submit</button>
      </form>
    </div>
    );
  }
}

ReactMixin(Signup.prototype, LinkedStateMixin);

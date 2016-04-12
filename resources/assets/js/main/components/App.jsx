'use strict';
/**
 * Created by Thomas on 30.03.2016.
 */
import React from 'react';
import LoginStore from '../stores/LoginStore'
import { Route, RouteHandler, Link } from 'react-router';
import AuthService from '../services/AuthService'
import Dashboard from './Dashboard.jsx'

module.exports = class App extends React.Component {
    render() {
        return (
            <div className="container-fluid">
              <nav className="navbar navbar-default">
                <div className="navbar-header">
                  <Link to="/" className="navbar-brand">React Flux app with JWT authentication</Link>
                </div>
                {this.headerItems}
              </nav>
              <div className="container">
                {this.props.children}
              </div>
            </div>
          );

    }
    static willTransitionTo(transition) {
      console.log("intercepting transition path", transition.path);
    }
    constructor(props) {
      super(props)
      this.state = this._getLoginState();
    }

    _getLoginState() {
      return {
        userLoggedIn: LoginStore.isLoggedIn()
      };
    }

    componentDidMount() {
      this.changeListener = this._onChange.bind(this);
      LoginStore.addChangeListener(this.changeListener);
    }

    _onChange() {
      this.setState(this._getLoginState());
    }

    componentWillUnmount() {
      LoginStore.removeChangeListener(this.changeListener);
    }
  logout(e) {
      e.preventDefault();
      AuthService.logout();
    }

    get headerItems() {
      if (!this.state.userLoggedIn) {
        return (
        <ul className="nav navbar-nav navbar-right">
          <li>
            <Link to="login">Login</Link>
          </li>
          <li>
            <Link to="signup">Signup</Link>
          </li>
        </ul>)
      } else {
        return (
        <ul className="nav navbar-nav navbar-right">
          <li>
            <Link to="home">Home</Link>
          </li>
          <li>
            <Link to="contacts">Contacts</Link>
          </li>
          <li>
            <Link to="calendar">Calendar</Link>
          </li>
          <li>
            <Link to="files">files</Link>
          </li>
          <li>
            <a href="" onClick={this.logout}>Logout</a>
          </li>
        </ul>)
      }
    }

}

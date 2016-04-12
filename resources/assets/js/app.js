/**
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * FACEBOOK BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
 * AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

// Polyfill from https://github.com/reactjs/react-router/issues/1500
if(typeof require.ensure !== "function") require.ensure = function(d, c) { c(require) };
// This file bootstraps the entire application.
//imports.
//vendors....
import React from 'react'
import { render } from 'react-dom'
import { renderToString } from 'react-dom/server';
import {DefaultRoute, Route, Router, RoutingContext, Match, hashHistory,browserHistory } from 'react-router';
//compoenents ....
import App from './main/components/App.jsx'
import Home from './main/components/Home.jsx'
import Login from './main/components/Login.jsx'
import Signup from './main/components/Signup.jsx'
import Dashboard from './main/components/Dashboard.jsx'
import RouterContainer from './main/services/RouterContainer'
import LoginActions from './main/actions/LoginActions'
window.React = React; // export for http://fb.me/react-devtools

//singin the user if we have a localaly stored token
let jwt = localStorage.getItem('jwt');
if (jwt) {
    LoginActions.loginUser(jwt);
    //hashHistory.push("/home");
}

const routes = {
    component: App,
    path:"/",
    name:"root",
    indexRoute: { component: Dashboard },
    childRoutes: [
        require('./file_browser'),//the one of many componenets to require
        {path:"login",name:"login",component:Login},
        {path:"signup",name:"signup",component:Signup},
        {path:"home",name:"home",component:Home}
        //<Route name="signup" path="/signup" handler={Signup}/>
    ]
}
let router = (<Router history={hashHistory} routes={routes} />)
RouterContainer.set(router);


render(
    router,
    document.getElementById('react')
);

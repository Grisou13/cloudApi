'use strict';

import React from 'react'
import FileList from './FileList'
import Store from '../stores/FileStorage'
import Creator from "../actions/FileActionCreator"
import Helpers from "../utils/FileHelpers"


class BreadCrumbElement extends React.Component{
  static handleClick()
  {
    Creator.clickFolder(this.props.path)
  }
  render()
  {
    return (
      <span onClick={this.handleClick}>
        {this.props.folder} >
      </span>)
  }
}

class Breadcrumb extends React.Component{
  /* jshint ignore:start */
  render() {
    var elements;
    if(this.props.path){

      elements = Helpers.splitPath(this.props.path).map(function(obj){ //the object is the reuslt of splitPath in the utils/FileHelpers
        var path, folderName;
        path = obj.path;
        folderName = obj.folderName;
        return (<BreadCrumbElement key={path} folder={folderName} path={path} />);
      });
    }
    return (
      <div className="breadcrumb">
        {elements}
      </div>
    );
  }
  /* jshint ignore:end */

}

export {BreadCrumbElement,Breadcrumb}
export default Breadcrumb

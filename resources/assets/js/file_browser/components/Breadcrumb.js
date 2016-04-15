'use strict';

import React from 'react'
import FileList from './FileList'
import Store from '../stores/FileStorage'
import FileService from "../services/FileService"
import Helpers from "../utils/FileHelpers"


class BreadCrumbElement extends React.Component{
  constructor(){
    super();
    this.handleClick = this.handleClick.bind(this);
  }
  handleClick()
  {
    FileService.getFolderContent(this.props.path)
  }
  render()
  {
    let active = this.props.path == Store.getCurrentPath();
    let classes = "breadcrumb-element";
    if(active)
        classes += "active"
    return (
        <li>
            <a onClick={this.handleClick} className={"breadcrumb-element"}>
              {this.props.folder}
            </a>
        </li>
    )
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
      <ol className="breadcrumb">
        {elements}
        {this.props.addFolder}
      </ol>
    );
  }
  /* jshint ignore:end */

}

export {BreadCrumbElement,Breadcrumb}
export default Breadcrumb

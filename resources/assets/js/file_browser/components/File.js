'use strict';

import React from 'react'
import Store from '../stores/FileStorage'
import FileCreator from '../actions/FileActionCreator'
import FileService from '../services/FileService'
class File extends React.Component{
  handleClick(e){
    if(this.props.type == "directory")
      FileService.getFolderContent(this.props.path);
  }
  render(){
    var dir = this.props.type == "directory";
    var cls = dir? "folder":"file";
    return (
      <li onClick={this.handleClick} >
        <span className={"fa fa-"+cls}></span>
        <span>{this.props.name}</span>
      </li>
    )
  }

}
export default File

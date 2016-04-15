'use strict';

import React from 'react'
import Store from '../stores/FileStorage'
import FileCreator from '../actions/FileActionCreator'
import FileService from '../services/FileService'
class Directory extends React.Component{
  constructor(){
    super();
    this.handleClick=this.handleClick.bind(this);
  }
  handleClick(e){
      FileService.getFolderContent(this.props.path);
  }
  render(){
    return (
        <li onClick={this.handleClick} >
          <span className={"fa fa-folder file-browser-icon"}/>
          <span> {this.props.name}</span>
        </li>
    )
  }
}
class File extends React.Component{
  handleClick(e){
      FileService.getFileContent(this.props.id);
  }
  render(){
    return (
        <li onClick={this.handleClick} >
          <span className={"fa fa-file file-browser-icon"}/>
          <span className="file-browser-entry-name"> {this.props.name}</span>
        </li>
    )
  }
}
class DirectoryEntry extends React.Component{
  handleClick(e){
    if(this.props.type == "directory")
      FileService.getFolderContent(this.props.path);
  }
  render(){
    var dir = this.props.type == "directory";
    if(dir)
        return (<Directory {...this.props} />);
    else
        return (<File {...this.props} />)

  }

}
export default DirectoryEntry

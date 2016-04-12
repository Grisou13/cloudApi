'use strict';

import React from 'react'
import Store from '../stores/FileStorage'
import FileCreator from '../actions/FileActionCreator'
import File from "./File"
import FileService from '../services/FileService'
import {ROOT_DIR} from '../constants/FileConstants'

class FileList extends React.Component{
  constructor(props)
  {
    super(props);
    this.state = {files : FileService.getFolderContent(props.path)}
    this._onChange = this._onChange.bind(this)
  }
  static handleChange(e) {
    //this.transitionTo('/files/' + e.target.value);
  }

  static getFileListState() {
    return {
      files : Store.getFiles()
    };
  }

  componentWillMount() {
    Store.addChangeListener(this._onChange)
  }

  static componentDidMount() {
    FileCreator.getRoot()
  }

  componentWillUnmount() {
    Store.removeChangeListener(this._onChange)
  }
  _onChange() {
    this.setState(this.getFileListState())
  }

  /* jshint ignore:start */
  render() {
    let files;

    if (this.state.files) {
      files = this.state.files.map(function (file) {
        return <File key={file.id} {...file} />
      });
    }
    console.log(files);
    return (
        <ul name="files" onChange={ this.handleChange }>
          { files }
        </ul>
    );

  }
  /* jshint ignore:end */

}

export default FileList

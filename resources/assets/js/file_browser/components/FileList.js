'use strict';

import React from 'react'
import Store from '../stores/FileStorage'
import DirectoryEntry from "./DirectoryEntry"
import {ROOT_DIR} from '../constants/FileConstants'

class FileList extends React.Component{
  constructor(props)
  {
    super(props);
    this.state = FileList.getFileListState();
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

  /*static componentDidMount() {
    FileCreator.getRoot()
  }*/

  componentWillUnmount() {
    Store.removeChangeListener(this._onChange)
  }
  _onChange() {
    this.setState(FileList.getFileListState());
    console.log(this.state);
  }

  /* jshint ignore:start */
  render() {
    let files = null;

    if (this.state.files !== undefined && this.state.files.length > 0) {
      console.log(this.state.files);
      files = this.state.files.map(function (file) {
        return <DirectoryEntry key={parseInt(Math.random()*100000)} {...file} />
      });
      console.log(files);
    }
    return (
        <ul name="files" onChange={ this.handleChange }>
          { files }
        </ul>
    );

  }
  /* jshint ignore:end */

}

export default FileList

'use strict';

import React from 'react'
import FileList from './FileList'
import Store from'../stores/FileStorage'
import Creator from "../actions/FileActionCreator";
import BreadCrumb from "./Breadcrumb"
import Modal from 'react-modal'
import AuthenticatedComponent from '../../AuthenticatedComponent'
import FileService from '../services/FileService'
//TODO: ADD LINKED STATE MIXIN FOR SIMPLIER TWO WAY BINDING  https://facebook.github.io/react/docs/two-way-binding-helpers.html
class AddFolder extends React.Component{
  constructor(props){
    super(props);
    this.state = {showModal:false,newFolderName:""}

    this.handleChange = this.handleChange.bind(this);
    this.toggleModal = this.toggleModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
      this.addFolder = this.addFolder.bind(this);
  }
  static getState(){
      return {
        showModal:false,//default don't show the modal
        value:""
      }
  }
  toggleModal(){
    this.setState({
      showModal:!this.state.showModal
    });
  }
    closeModal(){
        this.setState({showModal:false});
    }
  handleChange(event){
      console.log(event);
    this.setState({
      value:event.target.value.substr(0,50)
    });
  }
  renderModal(){
    return (
      <div>
        <input type="text" value={this.state.newFolderName} onChange={this.handleChange} />
        <button onClick={this.addFolder} ><span>Add folder</span></button>
      </div>
    );
  }
  addFolder(){
    FileService.createDirectory(this.props.path+"/"+this.state.newFolderName);
      this.closeModal()
  }
  render(){
      let content = (<h2><button onClick={this.toggleModal}>Add a folder</button></h2>);
      if(this.state.showModal){
          content = (<input type="text" value={this.state.value} onCompositionUpdate={this.handleChange} onCompositionEnd={this.addFolder} />)
      }
    return (
        <div>
            {content}
        </div>

    );
  }
}
/*
 <Modal
 isOpen={this.state.showModal}
 onRequestClose={this.closeModal} >
 <div>
 <button onClick={this.closeModal}>close</button>
 <br/>
 <span>{this.props.path}</span>
 <input type="text" value={this.state.value} onChange={this.handleChange} />
 <input type="submit" onClick={this.addFolder} value="Add a folder" />
 </div>
 </Modal>
 */
let c = AuthenticatedComponent(class FileBrowser extends React.Component{
    constructor(props){
        super(props);
        this._onChange = this._onChange.bind(this);
        this.state = this.getFBState()
        FileService.getFolderContent(this.state.path);
    }
    static getState(){
        return Store.getState();
    }
  componentWillMount() {
    Store.addChangeListener(this._onChange);
  }
  componentWillUnmount() {
      Store.removeChangeListener(this._onChange);
  }
  _onChange () {
    this.setState(this.getFBState());
  }
  getFBState(){
    return {path:Store.getCurrentPath(),files:Store.getFiles()};
  }
  render() {
    return (
      <div>
        <h1><BreadCrumb path={this.state.path} addFolder={<AddFolder path={this.state.path} />} /></h1>

        <FileList path={this.state.path} />
      </div>
    );
  }

})

export default c
module.exports = c

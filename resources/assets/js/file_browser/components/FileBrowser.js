'use strict';

import React from 'react'
import FileList from './FileList'
import Store from'../stores/FileStorage'
import Creator from "../actions/FileActionCreator";
import BreadCrumb from "./Breadcrumb"
import Modal from 'react-modal'
import AuthenticatedComponent from '../../AuthenticatedComponent'
//TODO: ADD LINKED STATE MIXIN FOR SIMPLIER TWO WAY BINDING  https://facebook.github.io/react/docs/two-way-binding-helpers.html
class AddFolder extends React.Component{
  constructor(props){
    super(props);
    this.state = {showModal:false,newFolderName:""}
    this.handleChange = this.handleChange.bind(this);
    this.toggleModal = this.toggleModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
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
    Creator.addFolder(this.props.path+"/"+this.state.newFolderName);
      this.closeModal()
  }
  render(){
    return (
        <div>
            <h2><button onClick={this.toggleModal}>Add a folder</button></h2>
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
        </div>

    );
  }
}
let c = AuthenticatedComponent(class FileBrowser extends React.Component{
    constructor(props){
        super(props);
        this._onChange = this._onChange.bind(this);
        this.state = this.getFBState()
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
        <h1><BreadCrumb path={this.state.path} /></h1>
        <div><AddFolder path={this.state.path} /></div>
        <FileList path={this.state.path} {...this.props} />
      </div>
    );
  }

})

export default c
module.exports = c

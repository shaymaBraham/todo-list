import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import axios from 'axios'
import { withRouter } from 'react-router-dom'


class Nav extends Component {

  constructor(props){
      super(props);
  } 
  
  logout(e){
       e.preventDefault();  
       axios.post('api/logout')
          .then(response=> {
            this.props.history.push('/login');
          })
          .catch(error=> {
            console.log(error);
          });
  }
  
  handleClick(e){

    e.preventDefault();
    this.props.history.push('/login');

  }
  render() {

    if (this.props.link) {
      return (
        <nav className="navbar navbar-default">
          <div className="container-fluid">
              <div className="navbar-header">
                <a className="navbar-brand" href="#" >Todo-List</a>
              </div>
              <ul className="nav navbar-nav navbar-right">
  
              </ul>
          </div>
        </nav>
        )
    }
    return (
        <nav className="navbar navbar-default">
          <div className="container-fluid">
              <div className="navbar-header">
                <a className="navbar-brand" href="#" onClick ={this.handleClick.bind(this)}>Todo-List</a>
              </div>
              <ul className="nav navbar-nav navbar-right">
                <li><Link to="/login">Login</Link></li>
                <li><Link to="/register">Register</Link></li>
              </ul>
          </div>
        </nav>
      
    )
  }

}

export default  withRouter(Nav)
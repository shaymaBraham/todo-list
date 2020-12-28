import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {  BrowserRouter as Router, Switch, Route} from 'react-router-dom';

import TodoList from '../TodoList/TodoList';
import Login from '../../components/login.js';
import Register from '../../components/register.js'


ReactDOM.render(
	<Router>
	    <Switch>
	    <Route exact path='/' component={TodoList}/>
	   {/*  <Route path='/login' component={Login}/>
	    <Route path='/register' component={Register}/>
	    */}
	</Switch>
	</Router>,
    document.getElementById('app')
);



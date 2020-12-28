
import React, {Component} from 'react';
import './TodoList.css';

import 'axios';

import AddTaskForm from '../../components/AddTaskForm/AddTaskForm';
import TaskList from '../../components/TaskList/TaskList';

class TodoList extends Component{
  
  constructor(){

    super();
    
    this.state = {
      tasks: [],
      task: {
        title: '' ,
        description: ''
      },
     // token: JSON.parse(localStorage["appState"]).user.auth_token,

    }

    this.taskTitleChangedHandler = this.taskTitleChangedHandler.bind(this);
    this.addTaskHandler = this.addTaskHandler.bind(this);
    this.taskUpdateHandler = this.taskUpdateHandler.bind(this);
    this.deleteTaskHandler = this.deleteTaskHandler.bind(this);

  }

  componentDidMount(){
    axios.get('/api/tasks')
      .then(response => {
        this.setState({
          tasks: response.data.tasks
        });
      });
  }

  taskTitleChangedHandler(event){
   
    let nam = event.target.name;
    let val = event.target.value;
    this.setState({
      task: {
        ...this.state.task  ,
              [nam] : val
        
        
      }
    });


  }

  


  // Handler for task addition.
  addTaskHandler(event){
    event.preventDefault();

    let params = {title: this.state.task.title, done: 0, description: this.state.task.description}

    axios.post('/api/task/add', params).then(response => {
      console.log(response.data)
      if(response.data.success){
        axios.get('/api/tasks')
        .then(response => {
          this.setState({
            tasks: response.data.tasks,
            task: { title: '' ,
                    description: ''}
          });
        });
      }
    }).catch(error => { console.log(error) });

  }

  taskUpdateHandler(event){
    console.log(event.currentTarget)

    let id = event.currentTarget.getAttribute('id');
  
    let url = '/api/task/update/' + id;

    axios.post(url).then(response => {
      axios.get('/api/tasks')
      .then(response => {
        console.log(response.data);
        this.setState({
          tasks: response.data.tasks
        });
      });
    }).catch(error => { console.log(error) });

  }

  deleteTaskHandler(event){

    let id = event.currentTarget.getAttribute('id');
    let url = '/api/task/delete/' + id;

    axios.post(url).then(response => {
      axios.get('/api/tasks')
      .then(response => {
        this.setState({
          tasks: response.data.tasks
        });
      });
    }).catch(error => { console.log(error) });

  }
  
  render(){

    return(
    
      <div className="wrapper">

        
        <AddTaskForm changed={this.taskTitleChangedHandler} 
                     submitted={this.addTaskHandler}
                     title={this.state.task.title} 
                     description={this.state.task.description}
         />
        
        <TaskList tasks={this.state.tasks} marker={this.taskUpdateHandler} 
        delete={this.deleteTaskHandler} 
        />
        
      
      </div>
    
    
    );
    
  }
  
  
}

export default TodoList;
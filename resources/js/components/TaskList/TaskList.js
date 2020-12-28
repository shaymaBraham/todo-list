
import React from 'react';
import './TaskList.css';
import Task from './Task/Task';
import Nav from '../../components/navbar.js'


const taskList = (props) => {

  let tasks = props.tasks.map((task, index) => {

    return <Task title={task.label.charAt(0).toUpperCase() + task.label.slice(1)} id={task._id} done={task.state} description={task.description} key={index} clicked={props.marker} deleteTask={props.delete} show={props.show} hide={props.hide}/>

  });
  
  return (
    <div>
     
    <div className="taskListContainer">
    
      {props.tasks ? tasks : <div className="noTask"><p>No tasks yet.</p></div>}
  
    </div>
    </div>
  
  );
  
}

export default taskList;

import React from 'react';
import './AddTaskForm.css';
import Nav from '../../components/navbar.js'

const addTaskForm = (props) => {
  
  return (
    <div>
    <Nav link="Logout" />  
    <div className="formContainer text-center">
      <div>
        <form  onSubmit={(event) => props.submitted(event)}>
          <div className="form-group">
            <input type="text" className="form-control" id="title" name="title" placeholder="Title of task..." onChange={(event) => props.changed(event)} required value={props.title} />
          </div>
          <div className="form-group">
            <textarea  className="form-control" id="description" name="description" placeholder="Description of task..."    onChange={(event) => props.changed(event)} required value={props.description} >
          
              </textarea>
          </div>
          <button type="submit" className="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
    </div>
  
  );
  
}

export default addTaskForm;
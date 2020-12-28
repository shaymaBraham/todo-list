
import React from 'react';
import './Task.css';

import {Button,Modal} from "react-bootstrap";



const task = (props) => {
  const [show, setShow] = React.useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

 
  return(
  
  
    <div className={props.done ? 'task done' : 'task'} id={props.id} title={props.done ? null : 'Click to mark as done.'}> 
    
      <div className="task-container" onClick={(event) => props.clicked(event)} id={props.id}>
        <i className="fa fa-check check-mark"></i>
        
        <p  >{props.title}</p>
      </div>
        
      <div className="view-btn-container" title="Click to view description." onClick={handleShow} id={props.id}  >
        <i className="fa fa-eye remove-mark"></i>
      </div>
      <div className="close-btn-container" title="Click to delete." id={props.id} onClick={(event) => props.deleteTask(event)} >
        <i className="fa fa-times remove-mark"></i>
      </div>
      <Modal show={show} onHide={handleClose}>
        <Modal.Header closeButton>
          <Modal.Title>{props.title}</Modal.Title>
        </Modal.Header>
        <Modal.Body>{props.description}</Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={handleClose}>
            Close
          </Button>
          
        </Modal.Footer>
      </Modal>
     </div>
  
  );
  
}

export default task;
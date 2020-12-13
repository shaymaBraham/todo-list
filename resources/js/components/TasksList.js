
    import axios from 'axios'
    import React, { Component } from 'react'
    import { Link } from 'react-router-dom'
    import ReactDOM from 'react-dom';
    import { Modal,Button } from 'react-bootstrap';



    class TasksList extends Component {
      constructor () {
        super()
        this.state = {
          tasks: []
        }
      }

      componentDidMount () {
        axios.get('/api/tasks').then(response => {
          this.setState({
            tasks: response.data
          })
        })
      }
      
      handleShow (descr) {
        
           return(
            <Modal.Dialog>
            <Modal.Header closeButton>
              <Modal.Title>Descripiton of task</Modal.Title>
            </Modal.Header>
          
            <Modal.Body>
              <p>{descr}</p>
            </Modal.Body>
          
            <Modal.Footer>
              <Button variant="secondary">Close</Button>
             
            </Modal.Footer>
          </Modal.Dialog>
           );
        
     }

      render () {
        const { tasks } = this.state
        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-8'>
                <div className='card'>
                  <div className='card-header'>My Tasks</div>
                  <div className='card-body'>
                   
                    <ul className='list-group list-group-flush'>
                      {tasks.map(task => (
                        <li onClick={this.handleShow(task.description)}
                          className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                          key={task._id}
                        >
                          {task.label}
                          {task.state== 1 ? 
                          <span className='badge badge-success badge-pill'>
                           Completed
                          </span>
                          :
                          <span className='badge badge-warning badge-pill'>
                          non Completed
                          </span>
                         }
                          
                        </li>
                      ))}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        )
      }
    }

    export default TasksList ;

    if (document.getElementById('tasklist')) {
        ReactDOM.render(<TasksList />, document.getElementById('tasklist'));
    }

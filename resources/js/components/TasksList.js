
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

        console.log(JSON.parse(globalData))
        axios.get('/api/tasks').then(response => {
          this.setState({
            tasks: response.data
          })
        })
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

                     task.id_user==JSON.parse(globalData).user._id ?
                        <li 
                          className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                          key={task._id}
                        >
                          {task.id_user==JSON.parse(globalData).user._id ? task.label :''}
                         
                          {
                          task.id_user==JSON.parse(globalData).user._id ?
                          task.state== 1 ? 
                          <span className='badge badge-success badge-pill'>
                           Completed
                          </span>
                          :
                          <span className='badge badge-warning badge-pill'>
                          non Completed
                          </span>

                          :
                          ''
                         }
                          
                        </li>

                        :

                        ''
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

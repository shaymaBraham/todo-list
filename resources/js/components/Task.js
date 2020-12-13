import React from 'react';
import ReactDOM from 'react-dom';

function Task() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Task</div>

                        <div className="card-body">description</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Task;

if (document.getElementById('task')) {
    ReactDOM.render(<Task />, document.getElementById('task'));
}

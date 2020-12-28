<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\todo;
use Illuminate\Support\Facades\Auth;

use Session;

class TodoController extends Controller
{
    //
   

    public function index()
    {

        echo auth::id();
        $tasks = todo::all();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {

        
        $task = new Todo;
        $task->label = $request->title;
        $task->description = $request->description;
        $task->state = 0; 
        //$task->id_user = $request->get('iduser');;        
      
        if(!$task->save()){
            //Task was created show OK message
            return response()->json([
                'error' => 'Failed to add task.'
            ]);
        }

        //Task was created show OK message
        return response()->json(array('success' => true, 'task_created' => 1), 200);

    }


    public function update(Request $request, $id)
    {
        $task = Todo::find($id);

        // Toggle task done and undo.
        if($task->state === 1){
            $task->state = 0;
        }else{
            $task->state = 1;
        }

        $task->save();
    }

    public function destroy($id)
    {
        Todo::destroy($id);

        return response()->json([
            'message' => 'Task has been deleted.'
        ]);
    }

   
   /* public function insert(Request $request)
    {

        $this->validate($request, [
            'label' => 'required',
            'description' => 'required'
        ]);
        $todo = new todo();
        $todo->label = $request->get('label');
        $todo->description = $request->get('description');
        $todo->state = 0; 
        $todo->id_user = $request->get('iduser');;        
        $todo->save();

        Session::flash('flash_message', 'Task successfully added!');

        return redirect('home');
    }

public function edit($id){
    $iduser = Auth::id();

     
    
      $todo=todo::find($id);
    return view('edit_todo',compact('iduser','todo'));

}
   

    public function update(Request $request)
    {

        $this->validate($request, [
            'label' => 'required',
            'description' => 'required'
        ]);
       $id=$request->id_todo;

       $todo=todo::find($id);
        $todo->label = $request->get('label');
        $todo->description = $request->get('description');
              
        $todo->save();

        Session::flash('flash_message', 'Task successfully updated!');

        return redirect('home');
    }

    public function destroy(Request $request)
{

    $id=$request->id;
    echo $id;
    $todo = todo::findOrFail($id);

    $todo->delete();

     Session::flash('flash_message', 'Task successfully deleted!');

     return redirect('home');
}


public function markAsCompleted(Request $request)
      {

        
        $id=$request->id;
        $todo = todo::findOrFail($id);

    
        $todo->state = $request->state;
        $todo->update();
        
        Session::flash('flash_message', 'Task successfully completed!');

        return redirect('home');
      }
      */
    
}

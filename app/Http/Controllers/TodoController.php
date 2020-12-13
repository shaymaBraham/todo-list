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

         $iduser = Auth::id();
        return view('add_todo',compact('iduser'));

       
    }

    public function list()
    {

        
        $iduser = Auth::id();

       
        $tasks = todo::orderBy('created_at', 'desc')
        
        ->get();
      return $tasks->toJson();

    }

    public function insert(Request $request)
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
    
}

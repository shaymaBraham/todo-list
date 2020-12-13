@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <a href="{{ url('new-todo')}}" class="btn btn-success">add new task</a>
                   

<br><br>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<div class="table-responsive">
   <table class="table table-striped table-sm data-table">
		<thead>
	       <tr class="success">
				
				<th>Label</th>
				<th>Description</th>
				<th>Status</th>
                <th>Created at</th>
				<th></th>
			</tr>
		</thead>
	   @foreach($todos as $task)
	    <tr>
       
        <td>{{$task->label}}</td>
        <td>{{$task->description}}</td>

        @if($task->state)


        <td>Completed</td>

        @else
        <td>Uncompleted</td>

        @endif
        <td>{{$task->created_at}}</td>
        <td class="nowrap">
        <a class="btn btn-danger btn-sm deleteTask" data-id="{{$task->id}}" type="button" data-toggle="modal" data-target="#confirmDelete">
        Delete</a>
        <a class="btn btn-info btn-sm"  type="button"  href="{{ url('/edit-todo/' . $task->id) }}">
        Edit</a>
        @if($task->state==0)
        <a class="btn btn-success btn-sm markRead" data-id="{{$task->id}}" data-state="1" type="button" >
        Mark as completed</a>
        @else

        <a class="btn btn-warning btn-sm markRead" data-id="{{$task->id}}" data-state="0" type="button" >
        Mark as uncompleted</a>
        @endif
        </td>
        </tr>

        @endforeach
																	        								</tbody>
	</table>
</div>

                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<div class="modal fade modal-danger" id="confirmDelete" aria-labelledby="confirmDeleteLabel" 
tabindex="-1"  aria-modal="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
		Confirm Delete 
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          <span class="sr-only">close</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Are you sure to delete this task
	     </p>

         <span id="taskid" style="display:none;"></span>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline pull-left btn-light" type="button" data-dismiss="modal"><i class="fa fa-fw fa-close" aria-hidden="true"></i>Cancel</button>
		<button class="btn btn-danger pull-right" type="button" id="confirm"><i class="fa fa-fw fa-close" aria-hidden="true"></i>Confirm Delete</button>
      </div>
    </div>
  </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script >


$(document).ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 5 secs

$('.deleteTask').on('click',function(){
   
    $('#confirmDelete').modal('show')

    let id=$(this).attr('data-id');

    $('#taskid').text(id)



})

$('.markRead').on('click',function(){


    let id=$(this).attr('data-id');

    let state=$(this).attr('data-state');

    $.ajaxSetup({
        headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                     });
    $.ajax({
         url: "{{ route('markAsCompleted')}}",
         type: 'POST',
         data: {
           
                id:id,
                state:state
                
                
                },
        
         success: function (data) {
           location.reload();
         }

        });    

})

$('#confirm').on('click',function(){

$.ajaxSetup({
        headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                     });
    $.ajax({
         url: "{{ route('destroy')}}",
         type: 'POST',
         data: {
           
                id:$('#taskid').text(),
                
                
                },
        
         success: function (data) {
           location.reload();
         }

        });
})





});



</script>


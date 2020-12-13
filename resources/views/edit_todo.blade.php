@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editing task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('todo.update')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="label">Label:</label>
            <input type="text" class="form-control" name="label" value="{{$todo->label}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="model">Description:</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$todo->description}} </textarea>
            
          </div>
        </div>
        <input type="hidden" name="id_todo" value="{{$todo->id}}">

       
        <input type="hidden" name="iduser" value="{{$iduser}}">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>

                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

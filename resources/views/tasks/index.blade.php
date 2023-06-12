@extends('layouts.master')
@section('content')
    <div class="row mt-5">
        <div class="col-md-6">
            @if (session()->has('msg'))
                <div class="alert alert-success">{{session()->get('msg')}}</div>
            @else
                
            @endif
            <div class="card">
                <div class="card-header">
                    Add Task
                </div>
                <div class="card-body">
                    <form action="{{route('task.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" name="title" id ="task" placeholder="Enter your Task" class="form-control {{$errors->has('task') ? 'is-invalid': ''}}">
                            <div class="invalid-feedback">
                                {{$errors->has('task') ? $errors->first('task') : ''}}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                    </div>
            </div>

           
            
            <div class="card">
                <div class="card-header">
                    View Tasks
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th style="width:2em">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>
                                    <form action="{{route("task.destroy",$item->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
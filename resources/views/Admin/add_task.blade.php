@extends('layouts.admin_master')

@section('content')

<div>
    <div class="float-start">
        <h4 class="pb-3"> <strong>Create Task</strong></h4>
    </div>
    <div class="float-end">
        <a href="{{ route('all.tasks')}}" class="btn btn-info float-right">
            <i class="fa fa-arrow-left"></i> All Task
        </a>
    </div>
    <div class="clearfix"></div>
</div>

<div class="card card-body bg-light p-4">
    <form action="{{ url('/insert-task') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="task" class="form-label">Title</label>
            <input type="text" class="form-control" id="task" name="task">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputFirstName">Category Name</label>
            <select id="name" name="name" class="form-control">
                <option selected>Choose...</option>
                @foreach($categories as $c)
                <option value="{{$c->id}}">{{ $c->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                @if(!empty($statuses))
                @foreach ($statuses as $status)
                <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                @endforeach
                @endif
            </select>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Save
        </button>
    </form>
</div>

@endsection
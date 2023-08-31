@extends('layouts.app')

@section('title', $project->title)

@section('content')
    
<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $project->image}}" class="img-fluid rounded m-1" alt="{{ $project->title }}">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $project->title }}</h5>
          <p class="card-text">{{ $project->content }}</p>
          <p class="card-text"><small class="text-body-secondary">Update : {{ $project->updated_at }}</small></p>
        </div>
      </div>
    </div>
    {{-- buttons --}}
    <div class="d-flex justify-content-end m-2">
        {{-- back --}}
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary mt-4">Project List</a>

        {{-- edit --}}
        <a href="{{route('admin.projects.edit', $project )}}" class="btn btn-warning mx-3 mt-4 text-end">Edit Project</a>

        {{-- delete --}}
        <form method="POST" action="{{route('admin.projects.destroy', $project)}}" id="delete-form" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete Project</button>
        </form>
    </div>
  </div>

@endsection
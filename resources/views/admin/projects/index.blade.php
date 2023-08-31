@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    
    <div class="row row-cols-4 mt-4">
        @forelse($projects as $project)
            <div class="col">
                <div class="card mb-4" >
                    <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $project->title }}</h5>
                      <p class="card-text">{{ $project->getAbstract() }}</p>
                      <a href="{{ route('admin.projects.show')}}" class="btn btn-primary">Show this project</a>
                    </div>
                  </div>
            </div>
        @empty
            <h3 class="text-center mt-4">Non ci sono progetti</h3>
        @endforelse
    </div>
@endsection
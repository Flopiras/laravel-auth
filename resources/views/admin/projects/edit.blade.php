@extends('layouts.app')

@section('title', "modifica $project->title")

@section('content')
    {{-- back button --}}
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-4">Torna ai progetti</a>

    {{-- form --}}
    @include('includes.form')
@endsection

@section('scripts')

@vite('resources/js/image-preview.js')
@endsection
@extends('layouts.app')

@section('title', 'Crea nuovo progetto')

@section('content')
    {{-- back button --}}
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-4">Torna ai progetti</a>

    {{-- form --}}
    <form method="POST" action="{{ route('admin.projects.store') }}" class="mt-4">
        {{-- token --}}
        @csrf

        <div class="row">

            {{-- title --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Titolo</label>
                    <input type="text" class="form-control" id="title" maxlength="20" placeholder="Inserisci un titolo" value="{{ old('title') }}" required>
                </div>
            </div>
            
            {{-- content --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Testo del progetto</label>
                    <textarea class="form-control" id="content" rows="10" value="{{ old('content') }}"></textarea>
                </div>
            </div>

            {{-- link --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="url" class="form-label fw-bold">Link al progetto</label>
                    <input type="url" class="form-control" id="url" placeholder="Inserisci un link al progetto" value="{{ old('link') }}">
                </div>
            </div>

            {{-- image --}}
            <div class="col-7">
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Immagine</label>
                    <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Url immagine" value="{{ old('image') }}">
                </div>
            </div>
            {{-- preview --}}
            <div class="col-2">
                <img src="{{ old('image', $project->image ?? 'https://marcolanci.it/utils/placeholder.jpg') }}" class="img-fluid" id="image-preview" alt="preview">
            </div>
        </div>

        {{-- submit button --}}
        <div class="d-flex justify-content-end">
            <button class="btn btn-success">Salva</button>
        </div>
    </form>
@endsection

@section('scripts')

@vite('resources/js/image-preview.js')
@endsection
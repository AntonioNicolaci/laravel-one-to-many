@extends('admin.layouts.base')

@section('short_descriptions')

    <h1>Aggiungi un nuovo Lavoro</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action="{{ route('admin.works.store') }}" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <h3>Type</h3>
            @foreach($types as $type)
                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="type{{ $type->id }}"
                        name="types[]"
                        value="{{ $type->id }}"
                    >
                    <label class="form-check-label" for="type{{ $type->id }}">{{ $type->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="image_large" name="image_large" accept="image_large/*">
            <label class="input-group-text  @error('image_large') is-invalid @enderror" for="image_large">Link Immagine principale</label>
            @error('image_large')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="image_secondary_one" name="image_secondary_one" accept="image_secondary_one/*">
            <label class="input-group-text  @error('image_secondary_one') is-invalid @enderror" for="image_secondary_one">Link Immagine Secondaria #1</label>
            @error('image_secondary_one')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="image_secondary_two" name="image_secondary_two" accept="image_secondary_two/*">
            <label class="input-group-text  @error('image_secondary_two') is-invalid @enderror" for="image_secondary_two">Link Immagine Secondaria #2</label>
            @error('image_secondary_two')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="image_secondary_three" name="image_secondary_three" accept="image_secondary_three/*">
            <label class="input-group-text  @error('image_secondary_three') is-invalid @enderror" for="image_secondary_three">Link Immagine Secondaria #3</label>
            @error('image_secondary_three')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link Lavoro</label>
            <textarea
                class="form-control @error('link') is-invalid @enderror"
                id="link"
                rows="10"
                name="link">{{ old('link') }}</textarea>
            @error('link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="github" class="form-label">Link Repo GitHub</label>
            <textarea
                class="form-control @error('github') is-invalid @enderror"
                id="github"
                rows="10"
                name="github">{{ old('github') }}</textarea>
            @error('github')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="short_description" class="form-label">Descrizione Corta</label>
            <textarea
                class="form-control @error('short_description') is-invalid @enderror"
                id="short_description"
                rows="10"
                name="short_description">{{ old('short_description') }}</textarea>
            @error('short_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                rows="10"
                name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </form>

@endsection
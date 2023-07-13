@extends('admin.layouts.base')

@section('contents')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Link</th>
                <th scope="col">Link Repo</th>
                <th scope="col">Tipologia</th>
                <th scope=col>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
                <tr>
                    <th>{{ $work->title }}</th>
                    <th>
                        <a href="{{ $work->link }}">
                            Link Lavoro
                        </a>
                    </th>
                    <th>
                        <a href="{{ $work->github }}">
                            Link Repo
                        </a>
                    </th>
                    <th>
                        {{ $work->type->name }}
                    </th>
                    <th>
                        <a class="btn btn-primary" href="{{ route('admin.works.show', ['work' => $work]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('admin.works.edit', ['work' => $work]) }}">Edit</a>
                        <button
                            type="button"
                            class="btn btn-danger js-delete"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                        >
                            Delete
                        </button>
                    </th>
                </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection
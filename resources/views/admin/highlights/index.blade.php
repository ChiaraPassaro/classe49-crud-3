@extends('admin.layouts.base')

@section('documentTitle')
    All Highlights
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('highlights.create') }}">Add Highligth</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h1>All Highlights</h1>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($highlights as $highlight)
                                <tr>
                                    {{-- data resource --}}
                                    <td>{{ $highlight->title }}</td>
                                    <td>{{ $highlight->author }}</td>
                                    <td>{{ $highlight->created_at }}</td>
                                    <td>{{ $highlight->updated_at }}</td>
                                    {{-- actions --}}
                                    <td><a href="{{ route('highlights.show', $highlight->id) }}"
                                            class="btn btn-primary">View</a></td>
                                    <td><a href="{{ route('highlights.edit', $highlight->id) }}"
                                            class="btn btn-info">Modify</a></td>
                                    <td>
                                        <form action="{{ route('highlights.destroy', $highlight->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                        {{-- nel caso volessi fare prima un check con js --}}
                                        {{-- <button class="delete">Delete</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">{{ $highlights->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            {{-- <div class="modal">
                <form action="{{ route('highlights.destroy', $highlight->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </div> --}}
        </div>
    @endsection

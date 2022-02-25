@extends('admin.layouts.base')

@section('documentTitle')
    {{ $highlight->title }}
@endsection

@section('content')
    {{-- @foreach ($highlight->toArray() as $key => $value)
        {{ $key }} : {!! $value !!}
    @endforeach --}}



    <div class="container">
        <div class="row mt-5">
            <div class="col-10">
                <h2>{{ $highlight->title }}</h2>

            </div>
            <div class="col">
                <a class="btn btn-dark" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3">
                <h3>Text</h3>
                {!! $highlight->text !!}
            </div>
            <div class="col-3">
                <h3>Author</h3>
                {{ $highlight->author }}
            </div>
            <div class="col-3">
                <h3>Url</h3>
                {{ $highlight->url }}
            </div>

        </div>
        <div class="row">
            <div class="col-3">
                <h3>Created</h3>
                {{ $highlight->created_at }}
            </div>
            <div class="col-3">
                <h3>Updated</h3>
                {{ $highlight->updated_at }}
            </div>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3> {{ $category->title }}</h3>

                    <p>
                        {{ $category->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--  @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))  --}}


@extends('layouts.mainapp')
<title>Not Found 404</title>

@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Not Found 404</h2>
                <!-- Breadcrumbs -->
                <div>
                    Not Found 404
                </div>
            </div>
        </div>
    </div>
</div>
@stop

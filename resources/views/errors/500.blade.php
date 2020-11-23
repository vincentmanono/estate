{{--  @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))  --}}


@extends('layouts.mainapp')
<title>Server Error 500</title>

@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Server Error 500</h2>
                <!-- Breadcrumbs -->
                <div>
                    Server Error 500
                </div>
            </div>
        </div>
    </div>
</div>
@stop

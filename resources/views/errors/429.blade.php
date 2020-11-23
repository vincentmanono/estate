@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))


@extends('layouts.mainapp')
<title>Too Many Requestse 429</title>

@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Too Many Requestse 429</h2>
                <!-- Breadcrumbs -->
                <div>
                    Too Many Requestse 429
                </div>
            </div>
        </div>
    </div>
</div>
@stop

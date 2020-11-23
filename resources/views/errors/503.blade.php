
@extends('layouts.mainapp')
<title>Service Unavailable 503</title>

@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> {{$exception->getMessage()}} 503</h2>
                <!-- Breadcrumbs -->
                <div>
                   {{$exception->getMessage()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@extends('layouts.mainapp')
@section('title')

<title>Chief Properties -{{ $param }}</title>

@endsection
@section('content')


<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Properties</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Properties</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div id="features" class="section wb">
<div class="container">
    <div class="section-title row text-center">
        <div class="col-md-8 col-md-offset-2">
            <small>All Awesome Property Details</small>
            <h3>Property Details</h3>
            <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
        </div><!-- end col -->
    </div><!-- end title -->

    <hr class="invis">

    <div class="row">
      @foreach ($properties as $property)

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-widget">
            <div class="property-main">
                <div class="property-wrap">
                    <figure class="post-media wow fadeIn">
                        {{--  <a href="/storage/property/{{ $property->image }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>  --}}
                        <a href="{{ route('single.show',$property->id) }}"><img src="/storage/property/{{ $property->image }}" alt="" class="img-responsive">
                        </a>
                    </figure>
                    <div class="item-body">
                        <a href="{{ route('single.show',$property->id) }}"> <h3>{{ $property->name }}</h3> </a>
                        <div class="info">
                            <a href="{{ route('single.show',$property->id) }}"> <p><span>Address: {{ $property->address }}</span> <span>Branch: {{ $property->branch->name }}</span> </span> <span> Type <span class="estate-x-size">{{ $property->type }}</span> </span> </p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="item-foot">
                    <div class="pull-left">
                        <span class="prop-user-agent">
                            <i class="fa fa-user" aria-hidden="true">Manager</i>
                            {{ $property->user->name ?? '' }}
                        </span>
                    </div>
                    <div class="pull-right">
                        <span class="prop-date">
                            <a href="{{ route('single.show',$property->id) }}" class="btn btn-sm btn-info">More...</a>
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- end service -->
    </div>

      @endforeach


    </div><!-- end row -->
</div><!-- end container -->
</div><!-- end section -->



@endsection

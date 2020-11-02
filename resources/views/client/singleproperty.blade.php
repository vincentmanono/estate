@extends('layouts.mainapp')
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
                        <li>Property</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-6">

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
                                {{ $property->user->name }}
                            </span>
                        </div>
                        <div class="pull-right">
                            <span class="prop-date">
                                {{--  <a href="{{ route('property.images',$property->id) }}" class="btn btn-sm btn-info">More Images</a>  --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- end service -->

        </div>
        <div class="col-md-6">
            <div class="contact_form">
                <h3><i class="fa fa-envelope-o grd1 global-radius"></i>APARTMENT APPLICATION</h3>
                @include('messages')
                 <form id="contactform1" class="row" action="{{ route('request.application') }}" method="post">

                    @csrf()
                    @method('POST')

                    <fieldset class="row-fluid">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="first_name1" class="form-control" placeholder="name">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <select name="unit_id" class="form-control" id="">
                                <option value="">-----select-unit-----</option>
                                @foreach ($property->units as $unit)

                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>

                                @endforeach
                            </select>
                         </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" id="email1" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone" id="phone1" class="form-control" placeholder="Your Phone">
                        </div>





                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="identity"  class="form-control" placeholder="Your ID">
                        </div>
                        {{--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone1" id="phone1" class="form-control" placeholder="Your Phone">
                        </div>  --}}




                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" value="SEND" id="submit1" class="btn btn-light btn-radius btn-brd grd1 btn-block">Apply</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

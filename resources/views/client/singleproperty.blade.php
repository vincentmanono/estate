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
                        <li>Property</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 2%;">

</div>


<div class="container">
    <div class="row">
        <div class="col-md-6">

                        <div class="slideshow-container">

                            <div class="mySlides">
                                <img height="400" src="/storage/property/{{ $property->image }}" style="width:100%">
                            </div>

                                @foreach ($property->images as $image)

                                <div class="mySlides">
                                    <img height="400" src="/storage/property/{{ $image->image }}" style="width:100%">
                                </div>

                                @endforeach


                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            </div>
                        <br>
                                <div class="item-body"><h3>Property {{ $property->user->type }} : {{ $property->user->name }}</h3> </a>
                                    <div class="info">
                                        <a href="{{ route('single.show',$property->id) }}"> <p><span>Name: {{ $property->name }}</span><p><span>Address: {{ $property->address }}</span> <span>Branch: {{ $property->branch->name }}</span> </span> <span> Type <span class="estate-x-size">{{ $property->type }}</span> </span> </p>
                                        </a>
                                    </div>
                                </div>

                         <br>
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
                            <input type="email" name="email" id="email1" class="form-control" placeholder="Your Email">


                            <input type="text"  name="property_id" value="{{ "$property->id" }}" hidden >

                         </div>
                         <input type="text" name="status" value="0"  id="" hidden>
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

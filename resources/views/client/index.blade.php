@extends('layouts.mainapp')
@section('content')


<ul class='slideshow'>
    <li>
        <span>Summer</span>
    </li>
    <li>
        <span>Fall</span>
    </li>
    <li>
        <span>Winter</span>
    </li>
    <li>
        <span>Spring</span>
    </li>
</ul>

<div class="parallax first-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow slideInLeft hidden-xs hidden-sm">
                <div class="contact_form">
                    <h3><i class="fa fa-envelope-o grd1 global-radius"></i>APARTMENT APPLICATION</h3>
                    @include('messages')
                     <form id="contactform1" class="row" action="" method="post">{{--  {{ route('request.application') }}  --}}

                        @csrf()
                        @method('POST')

                        <fieldset class="row-fluid">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" id="first_name1" class="form-control" placeholder="name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select name="property_id" class="form-control" id="">
                                    <option value="">-----select-property-----</option>
                                    @foreach ($properties as $property)

                                    <option value="{{ $property->id }}">{{ $property->name }}</option>

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
            <div class="col-md-6 col-sm-12">
                <div class="big-tagline clearfix">
                    <h2>Chief Property Real Estates</h2>
                    <p class="lead">Welcome to Chief Properties Real Estate Site. </p>
                    <a data-scroll href="#gallery" class="btn btn-light btn-radius grd1 btn-brd">Contact Us</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="about-box">
    <div class="container">
        <div class="row">
            <div class="top-feature owl-carousel owl-theme">
                <div class="item">
                    <div class="single-feature">
                        <div class="icon"><img src="{{asset('/client/uploads/icon-01.png')}}" class="img-responsive" alt=""></div>
                        <h4><a href="#">Full Furnished</a></h4>
                        <p>Mauris eu porta orci. In at erat enim. Suspendisse felis erat, volutpat at nisl sit amet, maximus molestie nisi. </p>
                    </div>
                </div>
                <div class="item">
                    <div class="single-feature">
                        <div class="icon"><img src="{{asset('/client/uploads/icon-02.png')}}" class="img-responsive" alt=""></div>
                        <h4><a href="#">Living Inside a Nature</a></h4>
                        <p>Mauris eu porta orci. In at erat enim. Suspendisse felis erat, volutpat at nisl sit amet, maximus molestie nisi.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="single-feature">
                        <div class="icon"><img src="{{asset('/client/uploads/icon-03.png')}}" class="img-responsive" alt=""></div>
                        <h4><a href="#">Luxurious Fittings</a></h4>
                        <p>Mauris eu porta orci. In at erat enim. Suspendisse felis erat, volutpat at nisl sit amet, maximus molestie nisi. </p>
                    </div>
                </div>
                <div class="item">
                    <div class="single-feature">
                        <div class="icon"><img src="{{asset('/client/uploads/icon-04.png')}}" class="img-responsive" alt=""></div>
                        <h4><a href="#">Non Stop Security</a></h4>
                        <p>Lorem Is a dummy Mauris eu porta orci. In at erat enim. Suspendisse felis erat, volutpat at nisl sit amet, maximus molestie nisi. </p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr1">

        <div class="row">
            <div class="col-md-6">
                <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <img src="{{asset('client/uploads/about_bg.jpg')}}" alt="" class="img-responsive">
                </div><!-- end media -->
            </div>
            <div class="col-md-6">
                <div class="message-box right-ab">
                    <h4>Chief Properties</h4>
                    <h2>Welcome to Chief Properties Real Estate</h2>
                    <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                    <p>Aenean eleifend in felis id viverra. Vestibulum semper ex eu molestie pulvinar. Maecenas non efficitur metus, et semper sem. Mauris ligula sapien, gravida a scelerisque ut, vehicula sed mauris. Proin dapibus mi id vulputate euismod. Nam ullamcorper dui tellus, non lacinia lorem hendrerit eu. Donec at orci cursus, rutrum metus eget, cursus turpis.  </p>
                    <a href="#" class="btn btn-light btn-radius grd1 btn-brd"> Read More </a>
                </div>
            </div>
        </div>

    </div>
</div>



<div id="testimonials" class="section lb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 col-md-offset-2">
                <h3>Happy Tenants</h3>
                <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
            </div><!-- end col -->
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>

                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_01.png')}}" alt="" class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_02.png')}}" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips <small>- Designer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_03.png')}}" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy <small>- Newyork City</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_01.png')}}" alt="" class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_02.png')}}" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips <small>- Designer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team! <i class="fa fa-quote-right"></i></h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="{{asset('client/uploads/testi_03.png')}}" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy <small>- Newyork City</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div><!-- end testimonial -->
                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

@endsection

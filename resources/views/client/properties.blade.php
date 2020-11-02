@extends('layouts.mainapp')
@section('content')

<header class="header header_style_01">
    <nav class="megamenu navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logos/logo.png" alt="image"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About us </a></li>
                    <li><a href="service.html">Service</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a class="active" href="properties.html">Properties</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="social-links"><a href="#"><i class="fa fa-twitter global-radius"></i></a></li>
                    <li class="social-links"><a href="#"><i class="fa fa-facebook global-radius"></i></a></li>
                    <li class="social-links"><a href="#"><i class="fa fa-linkedin global-radius"></i></a></li>
                    <li class="search-option">
                        <button class="search tran3s dropdown-toggle" id="searchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <form action="#" class="p-color-bg dropdown-menu tran3s" aria-labelledby="searchDropdown">
                            <input type="text" placeholder="Search....">
                            <button class="p-color-bg"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                   </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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
                            {{ $property->user->name }}
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

<div id="testimonials" class="section lb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 col-md-offset-2">
                <h3>Happy Customers</h3>
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
                            <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
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
                            <img src="uploads/testi_02.png" alt="" class="img-responsive alignleft">
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
                            <img src="uploads/testi_03.png" alt="" class="img-responsive alignleft">
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
                            <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
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
                            <img src="uploads/testi_02.png" alt="" class="img-responsive alignleft">
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
                            <img src="uploads/testi_03.png" alt="" class="img-responsive alignleft">
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

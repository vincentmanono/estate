<div class="card">
    <div class="card-body">
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="img-responsive" src="/storage/property/{{$property->image}}" alt="{{ $property->name }}">
                </div>

                @foreach ($property->images as $image)

                    <div class="carousel-item">
                    <img class="img-responsive" src="/storage/property/{{ $image->image }}" alt="{{ $property->name  }}">
                </div>
                @endforeach



            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <div class="p-t-20 p-b-20">
            <h4 class="card-title">Property Images</h4>
            <h5 class="m-b-0"><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>{{ $property->address }}</span></h5>
        </div>
        <hr class="m-0">
        <h4 class="card-title">Property Description</h4>
        <p class="text-dark p-t-20 pro-desc">{{ $property->description }}</p>
    </div>
</div>

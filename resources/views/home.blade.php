@extends('layouts.app')

@section('title', 'Home')


@section("slidebar")


    <section class="slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
         @php
    $images = [
        'images/1753856621.jpg',
        'images/1753851389.jpg',
        'images/1753845941.jpg',
    ];
@endphp



@for ($i = 0; $i < 3; $i++)
    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
        <div class="slider_item-box">
            <div class="slider_item-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 d-flex justify-content-center align-items-center">
                            <div class="slider_img-box">
                                <img src="{{ asset($images[$i]) }}" alt="watch image {{ $i+1 }}" class="slider-image" />
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="slider_item-detail">
                                <div>
                                    <h1>Stylish watches</h1>
                                    <p>
                                        Discover timeless elegance with our collection of stylish watches,
                                        designed to complement every moment with sophistication and precision.
                                    </p>
                                    <div class="d-flex">
                                        <a href="{{ route('about') }}" class="slider-btn1 mr-3">Read More</a>
                                        <a href="{{ route('contact') }}" class="slider-btn2">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endfor
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
      </div>
@endsection

@section('content')
 <div class="bg">
  

  <section class="latest_watches_section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Latest Watches</h2>
        <div class="row justify-content-center">
            @forelse ($latestWatches as $watch)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center shadow-sm">
                        <img src="{{ asset('images/' . $watch->image) }}" 
                             class="card-img-top" 
                             alt="{{ $watch->name }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $watch->name }}</h5>
                            <p class="card-text text-muted">${{ $watch->price }}</p>
                            <a href="{{ route('watches.show', $watch->id) }}" class="btn btn-outline-primary">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No watches found.</p>
            @endforelse
        </div>
    </div>
</section>




</section>


<section class="why_section layout_padding">
  <div class="container">
    <h3 class="custom_heading">Why Choose Us</h3>
    <p class="font-weight-bold">
      It’s a well-known fact that readers often get distracted by filler text, but we focus on delivering real value, quality, and trust you can count on.
    </p>
    <div class="row">
      @php
        $features = [
          [
            'title' => 'Fast Delivery',
            'desc' => 'We ensure your orders reach you quickly and safely, so you can enjoy your products without unnecessary waiting.',
            'img' => 'feature-1.png',
          ],
          [
            'title' => 'Free Shipping',
            'desc' => 'Get your products delivered at no extra cost, making your shopping experience even better.',
            'img' => 'feature-2.png',
          ],
          [
            'title' => 'Best Quality',
            'desc' => 'We offer products of the highest quality, ensuring durability and satisfaction.',
            'img' => 'feature-3.png',
          ],
          [
            'title' => '24x7 Customer Support',
            'desc' => 'Our team is available around the clock to assist you with any questions or concerns.',
            'img' => 'feature-4.png',
          ],
        ];
      @endphp

      @foreach ($features as $feature)
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="img_box mr-3">
              <img src="{{ asset('images/' . $feature['img']) }}" alt="{{ $feature['title'] }}" style="width: 60px; height: 60px;">
            </div>
            <div class="detail_box">
              <h5>{{ $feature['title'] }}</h5>
              <p>{{ $feature['desc'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

  </div>


 
  @endsection
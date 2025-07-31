@extends('layouts.app')

@section('title', 'About Us')
@section('body-class', 'sub_page')

@section('content')
<div class="bg">
  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-2">
          <div class="about_detail-box">
            <h3 class="custom_heading">About our watch</h3>
            <p>
              Our watch combines timeless craftsmanship with modern design, delivering unmatched quality and style for every occasion.
            </p>
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="about_img-box">
            <img src="{{ asset('images/about.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')


  


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <h2 class="custom_heading text-center">
      NOW CONTACT US
    </h2>
    <div class="container mt-5 pt-5">
      <form action="">
        <div>
          <input type="text" placeholder="NAME">
        </div>
        <div>
          <input type="email" placeholder="EMAIL">
        </div>
        <div>
          <input type="text" placeholder="PHONE NUMBER">
        </div>
        <div>
          <input type="text" class="message-box" placeholder="MESSAGE">
        </div>
        <div class="d-flex justify-content-center mt-5 pt-5">
          <button>
            SEND
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- end contact section -->

  @endsection
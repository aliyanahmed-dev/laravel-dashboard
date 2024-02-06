@extends('layouts.main')

@section('content')

<!--==============================
    Breadcumb
============================== -->



<div class="space" id="contact-sec">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-xl-7">
        <div class="contact-form-wrap background-image" style="background-image: url(&quot;assets/img/bg/contact_bg_1.png&quot;);">
          <span class="sub-title">Log in to your Account!</span>
          <h2 class="border-title">Sign in</h2>
          <p class="mt-n1 mb-30 sec-text">Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <form action="{{route('user_login')}}" method="POST" class="">
            @csrf
            @if($errors->any())

            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
              {!! implode('', $errors->all('<div>:message</div>')) !!}
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <input type="email" class="form-control style-white" name="email" id="email" placeholder="Email Address*">
                  <i class="fal fa-envelope"></i>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="password" class="form-control style-white" name="password" id="password" placeholder="Password*">
                  <i class="fal fa-eye"></i>
                </div>
              </div>

              <div class="form-btn col-12 mt-10">
                <button type="submit" class="th-btn">Submit<i class="fas fa-long-arrow-right ms-2"></i></button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')

@endsection

@section('script')

@endsection
@extends('layouts.welcome-app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="hero-text-container text-center text-md-left">
          <h1>Your Next Job is Here</h1>
          <p class="lead">Connecting outstanding people with the world’s most innovative companies. Machine learning driven.</p>
          <a href="#">Evaluate my Interview</a>&nbsp;&nbsp;<i class="fas fa-1x camera-icon fa-video"></i>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="main-hero-container pt-4">
          <img src="{{ asset('assets/media/photos/bg_office_people.svg') }}" id="hero-office-people">
        </div>
      </div>
    </div>
  </div>

  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <div class="segment-title-container">
            <div class="pt-5">
              <h5>Get Instant Review</h5>
              <p>Connecting outstanding people with the world’s <br>most innovative companies. Machine learning driven.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row pt-5">
      <div class="col-lg-4">
        <div class="steps-container">
          <div class="col-12">
            <div class="img-container">
              <img src="{{ asset('assets/media/photos/img_resume_website.svg') }}" id="">
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-2">
              <img src="{{ asset('assets/media/photos/ic_bullet_one.svg') }}" id="">
            </div>
            <div class="col-10 pl-0">
              <p>Connecting outstanding people with the world’s most innovative companies. Machine learning driven.</p>
            </div>
            </row>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="steps-container">
          <div class="col-12">
            <div class="img-container">
              <img src="{{ asset('assets/media/photos/img_resume_analysis.svg') }}" id="">
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-2">
              <img src="{{ asset('assets/media/photos/ic_bullet_two.svg') }}" id="">
            </div>
            <div class="col-10 pl-0">
              <p>Connecting outstanding people with the world’s most innovative companies. Machine learning driven.</p>
            </div>
            </row>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="steps-container">
          <div class="col-12">
            <div class="img-container">
              <img src="{{ asset('assets/media/photos/img_resume_result.svg') }}" id="">
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-2">
              <img src="{{ asset('assets/media/photos/ic_bullet_three.svg') }}" id="">
            </div>
            <div class="col-10 pl-0">
              <p>Connecting outstanding people with the world’s most innovative companies. Machine learning driven.</p>
            </div>
            </row>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <div class="segment-title-container">
            <div class="pt-5">
              <h5>3, 2, 1 Action!</h5>
              <p>Connecting outstanding people with the world’s <br>most innovative companies. Machine learning driven.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container pt-3 pb-4 mb-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <div class="video-recorder-container">
            <div class="d-flex justify-content-center">
              <div class="inner-camera">
                <img src="{{ asset('assets/media/photos/ic_record_mock.svg') }}" id="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
    
@endsection

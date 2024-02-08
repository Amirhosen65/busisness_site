@extends('layouts.home_master')

@section('home_content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="{{ route('home.page') }}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
                <h2>{{ $about->title }}</h2>
                <h3>{{ $about->sub_title }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                {!! html_entity_decode($about->description) !!}
              </p>

            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Clients</h2>
          </div>

          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

            @forelse ($brands as $brand)
              <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                  <img src="{{ asset('uploads/brands') }}/{{ $brand->image }}" class="img-fluid" alt="">
                </div>
              </div>
            @empty
              <h2 class="text-center text-danger">No data found!</h2>
            @endforelse

          </div>

        </div>
      </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

@endsection


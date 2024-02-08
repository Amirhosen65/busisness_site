@extends('layouts.home_master')

@section('home_content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="{{ route('home.page') }}">Home</a></li>
            <li>Portfolio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
        <div class="portfolio-details-container">
            <img src="{{ asset('uploads/portfolios') }}/{{ $portfolio->image }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{ $portfolio->RelationCategory->name }}</li>
              {{-- <li><strong>Client</strong>: ASU Company</li> --}}
              <li><strong>Project date</strong>: {{ \Carbon\Carbon::parse($portfolio->created_at)->format("M d, Y") }}</li>
              {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{ $portfolio->title }}</h2>
          <p>
            {!! html_entity_decode($portfolio->description) !!}
          </p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection


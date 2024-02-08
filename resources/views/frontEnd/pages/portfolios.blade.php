@extends('layouts.home_master')

@section('home_content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolios</h2>
          <ol>
            <li><a href="{{ route('home.page') }}">Home</a></li>
            <li>Portfolios</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>

                @foreach ($categories as $category)
                  <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                @endforeach

              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up">

            @forelse ($portfolios as $portfolio)
              <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->RelationCategory->slug }}">
                <img src="{{ asset('uploads/portfolios') }}/{{ $portfolio->image }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{ $portfolio->title }}</h4>
                  <p>{{ $portfolio->RelationCategory->name }}</p>
                  <a href="{{ asset('uploads/portfolios') }}/{{ $portfolio->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfolio->title }}"><i class="bx bx-plus"></i></a>
                  <a href="{{ route('portfolio.details', $portfolio->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            @empty
              <h2 class="text-danger text-center">No data found!</h2>
            @endforelse

          </div>

        </div>
      </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection


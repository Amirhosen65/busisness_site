@extends('layouts.home_master')

@section('home_content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="{{ route('home.page') }}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->

      <section id="contact" class="contact">
        <div class="container">

          <div class="row justify-content-center" data-aos="fade-up">

            <div class="col-lg-10">

              <div class="info-wrap">
                <div class="row">
                    <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="icofont-phone"></i>
                        <h4>Call:</h4>
                        <p>{{ $contact_info->phone }}</p>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>{{ $contact_info->email }}</p>
                    </div>
                    <div class="col-lg-4 info">
                        <i class="icofont-google-map"></i>
                        <h4>Address:</h4>
                        <p>{{ $contact_info->address }}</p>
                    </div>

                </div>
              </div>
            </div>
          </div>

          <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
              <form action="{{ route('contact.messages.create') }}" style="focu" method="post" role="" class="info-wrap contact-input">
                @csrf
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="text-center"><button  class="btn btn-success" type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;" src="{{ $contact_info->map_link }}" frameborder="0" allowfullscreen></iframe>
      </div>
      <!-- End Contact Section -->

  </main><!-- End #main -->

@endsection


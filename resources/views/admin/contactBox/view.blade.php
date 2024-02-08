@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
                  <div class="d-flex justify-content-between">
                      <h2 class="text-dark font-weight-medium">{{ $message->subject }}</h2>
                      <div class="btn-group">
                          <form action="{{ route('contact.messages.delete', $message->id) }}" method="GET">
                            <button class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i> Delete</button>
                          </form>
                              <form action="{{ route('contact.messages') }}" method="GET">
                                <button class="btn btn-sm btn-info">
                                    <i class="mdi mdi-arrow-left"></i> Back</button>
                            </form>

                      </div>
                  </div>
                  <div class="row pt-5">
                      <div class="col-md-12">
                          <p class="text-dark mb-2">From:</p>
                          <address>
                              Name: {{ $message->name }}
                              <br> Email: {{ $message->email }}
                              <br> Time: {{ \Carbon\Carbon::parse($message->created_at)->format("h:m A - M d, Y") }}
                          </address>
                      </div>

                  </div>

                    <div class="row pt-3">
                        <div class="col-md-12">
                            <p class="text-dark mb-2">Message:</p>
                            <address>
                            {{ $message->message }}
                            </address>
                        </div>
                    </div>

            </div>
        </div>

@endsection


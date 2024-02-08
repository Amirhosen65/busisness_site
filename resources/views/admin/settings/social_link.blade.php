@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Social Link</h2>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('contact.info.update',$contact_info->id) }}" method="POST"> --}}
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Facebook</label>
                            <textarea class="form-control @error('phone') is-invalid @enderror" name="phone" id="" cols="10" rows="5"></textarea>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Linkedin</label>
                            <textarea class="form-control @error('email') is-invalid @enderror" name="email" id="" cols="10" rows="5"></textarea>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Twitter</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="" cols="10" rows="5"></textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Instagram</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="" cols="10" rows="5"></textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Github</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="" cols="10" rows="5"></textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">YouTube</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="" cols="10" rows="5"></textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update</button>

                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection


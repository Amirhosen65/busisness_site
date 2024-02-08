@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">


        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Brand Edit</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('brand.edit',$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Brand Name</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Brand Name" name="brand_name" value="{{ $brand->brand_name }}">
                            @error('brand_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Brand Logo</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img class="mt-3" src="{{ asset('uploads/brands') }}/{{ $brand->image }}" alt="" style="height: 45px;">
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


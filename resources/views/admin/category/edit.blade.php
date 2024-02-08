@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">


        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Category Edit</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.edit',$category->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Category Name" name="name" value="{{ $category->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Category Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Category slug" name="slug" value="{{ $category->slug }}">
                            @error('slug')
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


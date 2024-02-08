@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">

        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Portfolio</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('portfolio.edit', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter title" name="title" value="{{ $portfolio->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mb-3">Feature Image</label><br>
                            <img src="{{ asset('uploads/portfolios') }}/{{ $portfolio->image }}" alt="" style="height: 200px;">
                            <input type="file" class="mt-3 form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote" cols="30" rows="20" placeholder="Describe portfolio details">{{ $portfolio->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="exampleFormControlSelect12">
                                <option value="">Chose a category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($portfolio->category_id==$category->id)
                                    selected
                                    @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>Please choose a category.</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect12" name="status">
                                @if ($portfolio->status == 'Published')
                                    <option value="Published" selected>Published</option>
                                    <option value="Draft">Draft</option>
                                @else
                                    <option value="Draft" selected>Draft</option>
                                    <option value="Published">Published</option>
                                @endif
                            </select>

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


@section('footer_script')

    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
    </script>

@endsection

@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Categories</h2>
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>


                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format("M d, Y") }}</td>


                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="{{ route('category.edit.view',$category->id) }}" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                        <form action="{{ route('category.delete',$category->id )}}" method="GET">
                                            @csrf

                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </td>

                              </tr>

                              @empty
                              <tr>
                                <td colspan="5" class="text-center text-danger"><h3>No data found!</h3></td>
                              </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter category Name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter slug" name="slug">

                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>

                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection


@section('footer_script')

{{-- alert message --}}
@if (session('success'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}",
            })
        </script>

        @endif

        @if (session('error_alert'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'error',
            title: "{{ session('error_alert') }}",
            })
        </script>

        @endif


@endsection

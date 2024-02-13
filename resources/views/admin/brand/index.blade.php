@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Brands</h2>
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/brands') }}/{{ $brand->image }}" alt="" style="height: 45px;">
                                </td>


                                <td>{{ \Carbon\Carbon::parse($brand->created_at)->format("M d, Y") }}</td>


                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="{{ route('brand.edit.view',$brand->id) }}" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                        <form action="{{ route('brand.delete',$brand->id )}}" method="GET">
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
                    <h2>Add Brand</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('brand.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Brand Name</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Brand Name" name="brand_name">
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

@endsection

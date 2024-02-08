@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                    <h2>Sliders</h2>
                    <a href="{{ route('slider.add') }}" class="btn btn-info btn-sm">Add Slider</a>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    {{ $slider->description }}
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/slider') }}/{{ $slider->image }}" alt="" style="height: 100px;">
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('slider.edit.view',$slider->id) }}" class="btn btn-info btn-sm">
                                            Edit
                                        </a>
                                        <a href="{{ route('slider.delete',$slider->id) }}" class="btn btn-danger btn-sm">
                                            Delete
                                        </a>
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

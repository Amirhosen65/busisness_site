@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Contact Info</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-weight: normal !important;">{{ $contact_info->phone }}</td>
                                <td>{{ $contact_info->email }}</td>
                                <td>{{ $contact_info->address }}</td>
                                <td>{{ \Carbon\Carbon::parse($contact_info->updated_at)->format("H:m - M d, Y") }}</td>

                                <td>
                                    <a href="{{ route('contact.info.edit',$contact_info->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o fa-lg"></i>
                                    </a>
                                </td>
                              </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-header card-header-border-bottom">
                    <h2>Google Map Link</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('map.link.update',$contact_info->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('map_link') is-invalid @enderror" value="{{ $contact_info->map_link }}" name="map_link" >
                            @error('map_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-footer mt-2">
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

@extends('admin.admin_master')
@extends('admin.icons_pack')



@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">

                <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                    <h2>Services</h2>
                    <a href="{{ route('service.add.view') }}" class="btn btn-info btn-sm">Add Service</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr>
                                <th scope="row">{{ $services->firstItem() + $loop->index }}</th>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>

                                <td class="text-center"><span><i class="{{ $service->icon }} fa-lg"></i></span></td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="{{ route('service.edit.view',$service->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o fa-lg"></i>
                                        </a>
                                        <a href="{{ route('service.edit.view',$service->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-lg"></i>
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

<script>
    $(document).ready(function () {
        // Reset the modal each time it is closed
        $('#iconModal').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
        });

        // Function to set the input value and show the modal
        function myFun(icon) {
            $('#showThat').val(icon);
            $('#iconModal').modal('show');
        }

        // Attach the click event to the icons
        $('.icon-modal-trigger').on('click', function () {
            let iconClass = $(this).find('i').attr('class');
            myFun(iconClass);
        });

    });
</script>


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

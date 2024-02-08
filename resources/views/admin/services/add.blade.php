@extends('admin.admin_master')
@extends('admin.icons_pack')



@section('content')

<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add service</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('service.add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Service Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter service title" name="title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlInput1" cols="30" rows="10" placeholder="Enter description"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="serviceIcon">Service Icon</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="showThat" name="icon" placeholder="Select Service Icon" data-toggle="modal" data-target="#iconModal">
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="iconModalLabel">Select an Icon</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body" style="overflow-x: scroll; height:350px;">
                                                    @foreach ($ficons as $icon)
                                                        <span class="fa-2x ms-2 me-2 icon-modal-trigger">
                                                            <i class="{{ $icon }}"></i>
                                                        </span>
                                                    @endforeach
                                                </div>
                                                <div class="card-footer text-end">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" id="iconModal" class="btn btn-primary btn-default">Submit</button>
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

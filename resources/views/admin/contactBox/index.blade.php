@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Contact Messages</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th class="text-center" scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $message)
                            <tr>

                                <th class="text-center" scope="row">{{ $messages->firstItem() + $loop->index }}</th>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ \Carbon\Carbon::parse($message->created_at)->format("M d, Y") }}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('contact.messages.view',$message->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye fa-lg"></i>
                                        </a>
                                        <a href="{{ route('contact.messages.delete',$message->id ) }}" class="btn btn-danger btn-sm">
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

                    {{-- Pagination  Start--}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($messages->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="mdi mdi-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $messages->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true" class="mdi mdi-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            @foreach ($messages->getUrlRange(1, $messages->lastPage()) as $page => $url)
                                @if ($page == $messages->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            @if ($messages->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $messages->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true" class="mdi mdi-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true" class="mdi mdi-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    {{-- Pagination  End--}}

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

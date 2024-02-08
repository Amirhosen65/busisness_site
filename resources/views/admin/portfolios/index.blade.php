@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">

                <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                    <h2>Portfolios</h2>
                    <a href="{{ route('portfolios.add.view') }}" class="btn btn-info btn-sm">Add Portfolio</a>
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{ $portfolios->firstItem() + $loop->index }}</th>
                                <td>
                                    <img src="{{ asset('uploads/portfolios') }}/{{ $portfolio->image }}" alt="" style="height: 80px;">
                                </td>
                                <td>{{ $portfolio->title }}</td>
                                <td>{!! \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($portfolio->description)), 100) !!}</td>

                                <td>{{ $portfolio->RelationCategory->name }}</td>
                                <td>
                                    <a href="{{ route('portfolios.status', $portfolio->id) }}">
                                        @if ($portfolio->status == 'Published')
                                        <span class="mb-2 mr-2 badge badge-pill badge-success">Published</span>
                                        @else
                                        <span class="mb-2 mr-2 badge badge-pill badge-danger">Draft</span>
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="{{ route('portfolio.edit.view',$portfolio->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o fa-lg"></i>
                                        </a>
                                        <a href="{{ route('portfolios.delete',$portfolio->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-lg"></i>
                                        </a>
                                    </div>
                                </td>
                              </tr>

                              @empty
                              <tr>
                                <td colspan="7" class="text-center text-danger"><h3>No data found!</h3></td>
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

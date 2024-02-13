@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">

                <div class="card-header card-header-border-bottom">
                    <h2>Social Link</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Account</th>
                                <th scope="col">URL</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($links as $link)
                            <tr>
                                <th scope="row">{{ $links->firstItem() + $loop->index }}</th>
                                <td style="text-transform: capitalize">{{ $link->account }}</td>
                                <td>{{ $link->url }}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                            {{-- <a href="{{ route('link.edit.view',$link->id) }}" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                        <form action="{{ route('link.delete',$link->id )}}" method="GET">


                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form> --}}

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
                <div class="card-header card-header-border-bottom">
                    <h2>Add Social Link</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.social.insert') }}">
                        @csrf
                        <label class="text-dark font-weight-medium" for="">Account Type</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select class="form-control" id="exampleFormControlSelect12" name="account">
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter">X (Formerly Twitter)</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="linkedin">Linkedin</option>
                                    <option value="youtube">Youtube</option>
                                    <option value="whatsapp">WhatsApp</option>
                                </select>
                            </div>
                            <input type="text" name="url" placeholder="Url" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
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

@extends('admin.adminlayout')
@section('bodycontent')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Enquery </span> </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Enquery</h5>
            @if (session('msg'))
                <div class="alert y-2 alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    <caption class="ms-4">
                        List of Enquery
                    </caption>
                    <thead>
                        <tr>
                            <th>Name<br /> Email, Contact</th>
                            <th>Subject <br /> Message</th>

                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if ($enqueries->count() > 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($enqueries as $enquery)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $enquery->name }}</strong><br />
                                        {{ $enquery->email }}<br/>{{ $enquery->contact }}
                                    </td>
                                    <td>{{ $enquery->subject }}<br />{{ substr($enquery->massage, 0, 50) . '...' }}
                                    </td>
                                    <td>
                                        @if ($enquery->status)
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Disabled</span>
                                        @endif
                                    </td>
                                    <td>


                                        <form action="/enquery_destroy/{{ $enquery->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endif
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <hr class="my-5" />

    </div>
    <!-- / Content -->
@stop

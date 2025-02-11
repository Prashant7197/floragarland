@extends('admin.adminlayout')
@section('bodycontent')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Customer </span> </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Customer</h5>
            @if (session('msg'))
                <div class="alert y-2 alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    <caption class="ms-4">
                        List of Customer
                    </caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact  </th> <th> Email</th>

                           
                        </tr>
                    </thead>
                    @if ($customers->count() > 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($customers as $customer)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $customer->name }}</strong></td>
                                        <td>
                                        {{ $customer->email }} </td> <td>{{ $customer->contact }}
                                    </td>
                                   
                                    {{-- <td>
                                        @if ($customer->status)
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Disabled</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td>


                                        <form action="/customer_destroy/{{ $customer->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </form>

                                    </td> --}}
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

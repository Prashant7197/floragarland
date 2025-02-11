@extends('admin.adminlayout')
@section('bodycontent')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Agents </span> </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Agents</h5>
            @if(session('msg'))
                <div class="alert y-2 alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    <caption class="ms-4">
                        List of Agents
                    </caption>
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Contact</th>
                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if ($agents->count() > 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($agents as $agent)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $agent->name }}</strong></td>
                                    <td title="{{ $agent->address }}">{{ $agent->address}}
                                    </td>
                                    <td>
                                        <img src="/images/agent/{{ $agent->profile }}" class="img-fluid "
                                            style="max-height:100px;" />
                                    </td>
                                    <td>{{$agent->contact.",".$agent->email}}</td>
                                    <td>
                                        @if($agent->status)
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item"
                                                    href="{{ route('agent.edit', $agent->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <form action="{{ route('agent.destroy', $agent->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </form>
                                            </div>
                                        </div>
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

@extends('admin.adminlayout')
@section('bodycontent')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Feedbacks </span> </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Feedbacks</h5>
            @if(session('msg'))
                <div class="alert y-2 alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    <caption class="ms-4">
                        List of Feedbacks
                    </caption>
                    <thead>
                        <tr>
                            <th>Name <br/>Description</th>
                            <th>Image</th>
                            <th>Feedback</th>
                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if ($feedbacks->count() > 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $feedback->name }}</strong><br />{{ $feedback->description}}
                                    </td>
                                    <td>
                                        <img src="/images/feedback/{{ $feedback->profile }}" class="img-fluid "
                                            style="max-height:100px;" />
                                    </td>
                                    <td style="font-size:14px;">{{substr($feedback->feedback,0,50)}}...</td>
                                    <td>
                                        @if($feedback->status)
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
                                                    href="{{ route('feedback.edit', $feedback->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <form action="{{ route('feedback.destroy', $feedback->id) }}"
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

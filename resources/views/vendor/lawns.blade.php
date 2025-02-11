@extends('vendor.vendorlayout')
@section('bodycontent')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <div class="card">
            <h5 class="card-header">My Lawns</h5>
            @if (session('msg'))
                <div class="alert y-2 alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    
                    <thead>
                        <tr>
                            <th>lawn</th>
                            <th><strong>Locality</strong> Address</th>
                            <th>Image</th>
                            
                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if ($lawns->count() > 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($lawns as $lawn)
                                <tr>
                                    <td>
                                        <strong>{{ $lawn->name }}</strong><br/>
                                        <a href="mailto:{{ $lawn->email }}">{{ $lawn->email }}</a><br/><a href="tel:{{ $lawn->contact }}">{{ $lawn->contact }}</a>
                                    </td>
                                    <td title="Locality:- {{ $lawn->locality }} address:- {{ $lawn->address }}"><strong>{{ $lawn->locality }}</strong> {{ $lawn->address }}
                                    </td>
                                    <td>

                                        <img src="/{{ explode(',',$lawn->images)[1] }}"
                                            style="max-height:200px;" />
                                    </td>
                                    <td>
                                        @if ($lawn->status)
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

                                                <a class="dropdown-item" href="{{route('vendor_lawn_edit',$lawn->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <form action="{{ route('lawn.destroy', $lawn->id) }}" method="POST">
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
@stop

@extends('Backend.base')

@section('content')

    <div class="container mt-1">
        <div class="row">
            <div class="col-8">
                @if(session()->has('deleted'))
                    <div class="alert alert-danger">
                        {{ session()->get('deleted') }}
                    </div>
                @endif
                @if(session()->has('updated'))
                    <div class="alert alert-success">
                        {{ session()->get('updated') }}
                    </div>
                @endif
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6>Manage Company</h6>
                        <div class="table-responsive">
                            <table class="table small">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td><img src="{{ asset('upload/'.$c->logo) }}" class="rounded" width="40"></td>
                                        <td><a href="{{ $c->website }}" target="_blank">{{ $c->website }}</a></td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="javascript:;" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $c->id }}"><i class="fas fa-edit fa-sm"></i></a>
                                                <a href="javascript:;" class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#delete{{ $c->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal For Edit --}}
                                    <div class="modal fade" id="edit{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('company.update',$c->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Update Details Easily</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-gorup mb-2">
                                                            <label for="name" class="text-muted small m-0 p-0">Name</label>
                                                            <input type="text" id="name" name="name" value="{{ $c->name }}" class="form-control shadow-none form-control-sm" autofocus>
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="email" class="text-muted small m-0 p-0">Email</label>
                                                            <input type="email" id="email" name="email" value="{{ $c->email }}" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="logo" class="text-muted small m-0 p-0">Logo <span class="text-danger small">(minimum 100×100)</span></label>
                                                            <input type="file" id="logo" name="logo" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="website" class="text-muted small m-0 p-0">Website</label>
                                                            <input type="url" id="website" name="website" value="{{ $c->website }}" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary btn-sm shadow-none">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Of Modal --}}

                                    {{-- Modal For Confirmation --}}
                                    <div class="modal fade" id="delete{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('company.destroy',$c->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @method('delete')
                                                        <h6>Are you sure you want to delete it?</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger btn-sm shadow-none">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- End Of Modal --}}
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center small">
                                {!! $companies->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6>Add Company</h6>
                        <hr>
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-gorup mb-2">
                                <label for="name" class="text-muted small m-0 p-0">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control shadow-none form-control-sm" requiredcautofocus>
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="email" class="text-muted small m-0 p-0">Email</label>
                                <input type="email" id="email" name="email" class="form-control shadow-none form-control-sm">
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="logo" class="text-muted small m-0 p-0">Logo <span class="text-danger small">(minimum 100×100)</span></label>
                                <input type="file" id="logo" name="logo" class="form-control shadow-none form-control-sm">
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="website" class="text-muted small m-0 p-0">Website</label>
                                <input type="url" id="website" name="website" class="form-control shadow-none form-control-sm">
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-sm shadow-none" type="button">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

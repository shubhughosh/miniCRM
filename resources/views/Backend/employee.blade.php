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
                        <h6>Manage Employee</h6>
                        <div class="table-responsive">
                            <table class="table small">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $e)
                                    <tr>
                                        <td>{{ $e->id }}</td>
                                        <td>{{ $e->first_name }}</td>
                                        <td>{{ $e->last_name }}</td>
                                        <td>{{ $e->company }}</td>
                                        <td>{{ $e->email }}</td>
                                        <td>{{ $e->phone }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="javascript:;" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $e->id }}"><i class="fas fa-edit fa-sm"></i></a>
                                                <a href="javascript:;" class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#delete{{ $e->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal For Edit --}}
                                    <div class="modal fade" id="edit{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('employee.update',$e->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Update Details Easily</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-gorup mb-2">
                                                            <label for="first_name" class="text-muted small m-0 p-0">First Name</label>
                                                            <input type="text" id="first_name" name="first_name" value="{{ $e->first_name }}" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="last_name" class="text-muted small m-0 p-0">Last Name</label>
                                                            <input type="text" id="last_name" name="last_name" value="{{ $e->last_name }}" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="company" class="text-muted small m-0 p-0">Company</label>
                                                            <select name="company" class="form-control shadow-none form-control-sm">
                                                                @foreach ($companies as $c)
                                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="email" class="text-muted small m-0 p-0">Email</label>
                                                            <input type="email" id="email" name="email" value="{{ $e->email }}" class="form-control shadow-none form-control-sm">
                                                        </div>
                                                        <div class="form-gorup mb-2">
                                                            <label for="phone" class="text-muted small m-0 p-0">Phone</label>
                                                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="phone" name="phone" value="{{ $e->phone }}" class="form-control shadow-none form-control-sm">
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
                                    <div class="modal fade" id="delete{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('employee.destroy',$e->id) }}" method="POST">
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
                                {!! $employees->links() !!}
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
                        <h6>Add Employee</h6>
                        <hr>
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="form-gorup mb-2">
                                <label for="first_name" class="text-muted small m-0 p-0">First Name <span class="text-danger">*</span></label>
                                <input type="text" id="first_name" name="first_name" class="form-control shadow-none form-control-sm" autofocus required>
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="last_name" class="text-muted small m-0 p-0">Last Name <span class="text-danger">*</span></label>
                                <input type="text" id="last_name" name="last_name" class="form-control shadow-none form-control-sm" required>
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="company" class="text-muted small m-0 p-0">Company</label>
                                <select name="company" class="form-control shadow-none form-control-sm">
                                    <option selected disabled>Select Company</option>
                                    @foreach ($companies as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="email" class="text-muted small m-0 p-0">Email</label>
                                <input type="email" id="email" name="email" class="form-control shadow-none form-control-sm">
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="phone" class="text-muted small m-0 p-0">Phone</label>
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="phone" name="phone" class="form-control shadow-none form-control-sm">
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

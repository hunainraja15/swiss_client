    @extends('layouts.app')
    @section('content')
    <style>
        .user-create-main{
            padding-right: 2rem;
        }
        /* Ensure dropdown works correctly inside table-responsive */
    .table-responsive .dropdown {
        position: static;
    }

    </style>
    <div class="container">
        <div class="card mt-5">
            <div class="d-flex justify-content-between">
                <h5 class="card-header">Client List</h5>
                <div class="mt-3 mr-3 user-create-main pr-3">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#createUserModal">
                        Create
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><i class='bx bx-hash'></i></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Postal Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->fname . ' ' . $user->lname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->postal_address }}</td>
                                <td>{{ $user->role }}</td>
                                <td>

                                    <form action="{{ route('user.status.update') }}" method="POST" class="form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <input type="hidden" name="status" value="{{ $user->status }}">
                                        <button type="submit" class="badge border-0 {{ $user->status == 'deactive' ? 'bg-danger' : 'bg-success' }} text-white">
                                            {{ ucfirst($user->status) }}
                                        </button>
                                    </form>
        
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"> <!-- Added dropdown-menu-end class -->
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUserModal{{$user->id}}" href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUserModal2{{$user->id}}" href="javascript:void(0);">
                                                <i class='bx bx-show' ></i> View
                                            </a>
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete-form{{ $user->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <form id="delete-form{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div class="modal fade" id="editUserModal2{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{$user->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editUserModalLabel{{$user->id}}">Edit User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="fname{{$user->id}}" class="form-label">First Name <span class="text-danger">*</span></label>
                                                        <input readonly type="text" class="form-control @error('fname') is-invalid @enderror" id="fname{{$user->id}}" name="fname"
                                                            placeholder="Enter your first name" value="{{ old('fname', $user->fname) }}" />
                                                        @error('fname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="lname{{$user->id}}" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                        <input readonly type="text" class="form-control @error('lname') is-invalid @enderror" id="lname{{$user->id}}" name="lname"
                                                            placeholder="Enter your last name" value="{{ old('lname', $user->lname) }}" />
                                                        @error('lname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="age{{$user->id}}" class="form-label">Age <span class="text-danger">*</span></label>
                                                        <input readonly type="date" class="form-control @error('age') is-invalid @enderror" id="age{{$user->id}}" name="age"
                                                            placeholder="Enter your company name" value="{{ old('age', $user->age) }}" />
                                                        @error('age')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="address{{$user->id}}" class="form-label">Address <span class="text-danger">*</span></label>
                                                        <input readonly type="test" class="form-control @error('address') is-invalid @enderror" id="address{{$user->id}}" name="address"
                                                            placeholder="Enter your company name" value="{{ old('address', $user->address) }}" />
                                                        @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="signature{{$user->id}}" class="form-label">Signature <span class="test-warning">(file)</span> <span class="text-danger">*</span></label>
                                                        <input readonly type="file" class="form-control @error('signature') is-invalid @enderror" id="signature{{$user->id}}" name="signature"
                                                            placeholder="Enter your company name" value="{{ old('signature', $user->signature) }}" />
                                                        @error('signature')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="email{{$user->id}}" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input readonly type="text" class="form-control @error('email') is-invalid @enderror" id="email{{$user->id}}" name="email"
                                                            placeholder="Enter your email" value="{{ old('email', $user->email) }}" />
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone_number{{$user->id}}" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                        <input readonly type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number{{$user->id}}" name="phone_number"
                                                            placeholder="Enter your phone number" value="{{ old('phone_number', $user->phone_number) }}" />
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="postal_address{{$user->id}}" class="form-label">Postal Address <span class="text-danger">*</span></label>
                                                        <input readonly type="text" class="form-control @error('postal_address') is-invalid @enderror" id="postal_address{{$user->id}}" name="postal_address"
                                                            placeholder="Enter your postal address" value="{{ old('postal_address', $user->postal_address) }}" />
                                                        @error('postal_address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-md-12 mb-3">
                                                        <label for="create_role" class="form-label">Role <span class="text-danger">*</span></label>
                                                        <select disabled class="form-select select2 js-example-basic-single @error('role') is-invalid @enderror" id="create_role" name="role">
                                                            <option value="" disabled>Select a role</option>
                                                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                                            <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>Client</option>
                                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>

                                                        </select>
                                                        @error('role')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="password{{$user->id}}">Password <span class="text-danger">*</span></label>
                                                        <div class="input-group input-group-merge">
                                                            <input readonly type="password" id="password{{$user->id}}" class="form-control @error('password') is-invalid @enderror" name="password"
                                                                placeholder="Enter new password" aria-describedby="password" value="{{ old('password') }}" />
                                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                        </div>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="password_confirmation{{$user->id}}">Confirm Password <span class="text-danger">*</span></label>
                                                        <input readonly type="password" id="password_confirmation{{$user->id}}" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                                            placeholder="Confirm your password" />
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        
                                
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{$user->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editUserModalLabel{{$user->id}}">Edit User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="client">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="fname{{$user->id}}" class="form-label">First Name <span class="text-danger">*</span></label>
                                                        <input  type="text" class="form-control @error('fname') is-invalid @enderror" id="fname{{$user->id}}" name="fname"
                                                            placeholder="Enter your first name" value="{{ old('fname', $user->fname) }}" />
                                                        @error('fname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="lname{{$user->id}}" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                        <input  type="text" class="form-control @error('lname') is-invalid @enderror" id="lname{{$user->id}}" name="lname"
                                                            placeholder="Enter your last name" value="{{ old('lname', $user->lname) }}" />
                                                        @error('lname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="age{{$user->id}}" class="form-label">Age <span class="text-danger">*</span></label>
                                                        <input  type="date" class="form-control @error('age') is-invalid @enderror" id="age{{$user->id}}" name="age"
                                                            placeholder="Enter your company name" value="{{ old('age', $user->age) }}" />
                                                        @error('age')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="address{{$user->id}}" class="form-label">Address <span class="text-danger">*</span></label>
                                                        <input  type="test" class="form-control @error('address') is-invalid @enderror" id="address{{$user->id}}" name="address"
                                                            placeholder="Enter your company name" value="{{ old('address', $user->address) }}" />
                                                        @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="signature{{$user->id}}" class="form-label">Signature <span class="test-warning">(file)</span> <span class="text-danger">*</span></label>
                                                        <input  type="file" class="form-control @error('signature') is-invalid @enderror" id="signature{{$user->id}}" name="signature"
                                                            placeholder="Enter your company name" value="{{ old('signature', $user->signature) }}" />
                                                        @error('signature')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="email{{$user->id}}" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input  type="text" class="form-control @error('email') is-invalid @enderror" id="email{{$user->id}}" name="email"
                                                            placeholder="Enter your email" value="{{ old('email', $user->email) }}" />
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone_number{{$user->id}}" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                        <input  type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number{{$user->id}}" name="phone_number"
                                                            placeholder="Enter your phone number" value="{{ old('phone_number', $user->phone_number) }}" />
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="postal_address{{$user->id}}" class="form-label">Postal Address <span class="text-danger">*</span></label>
                                                        <input  type="text" class="form-control @error('postal_address') is-invalid @enderror" id="postal_address{{$user->id}}" name="postal_address"
                                                            placeholder="Enter your postal address" value="{{ old('postal_address', $user->postal_address) }}" />
                                                        @error('postal_address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="password{{$user->id}}">Password <span class="text-danger">*</span></label>
                                                        <div class="input-group input-group-merge">
                                                            <input  type="password" id="password{{$user->id}}" class="form-control @error('password') is-invalid @enderror" name="password"
                                                                placeholder="Enter new password" aria-describedby="password" value="{{ old('password') }}" />
                                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                        </div>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="password_confirmation{{$user->id}}">Confirm Password <span class="text-danger">*</span></label>
                                                        <input  type="password" id="password_confirmation{{$user->id}}" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                                            placeholder="Confirm your password" />
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createUserModalLabel">Create New Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" value="client">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname"
                                    placeholder="Enter your first name" value="{{ old('fname') }}" />
                                @error('fname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname"
                                    placeholder="Enter your last name" value="{{ old('lname') }}" />
                                @error('lname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('age') is-invalid @enderror" id="age" name="age"
                                    placeholder="Enter your age" value="{{ old('age') }}" />
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                    placeholder="Enter your address" value="{{ old('address') }}" />
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="signature" class="form-label">Signature <span class="text-warning">(file)</span> <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('signature') is-invalid @enderror" id="signature" name="signature" />
                                @error('signature')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"
                                    placeholder="Enter your phone number" value="{{ old('phone_number') }}" />
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="postal_address" class="form-label">Postal Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('postal_address') is-invalid @enderror" id="postal_address" name="postal_address"
                                    placeholder="Enter your postal address" value="{{ old('postal_address') }}" />
                                @error('postal_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Enter new password" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                    placeholder="Confirm your password" />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                var createUserModal = new bootstrap.Modal(document.getElementById('createUserModal'));
                createUserModal.show();
            @endif

            @foreach ($users as $user)
                @if ($errors->has('user_id') && $errors->first('user_id') == $user->id)
                    var editUserModal = new bootstrap.Modal(document.getElementById('editUserModal{{ $user->id }}'));
                    editUserModal.show();
                @endif
            @endforeach
        });

    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    @endsection

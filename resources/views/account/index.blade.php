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
            <h5 class="card-header">User List</h5>
            
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th><i class='bx bx-hash'></i></th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Account Creation Date</th>
                                <th>Phone Number</th>
                                <th>Postal Address</th>
                                <th>Role</th>
                                <th>Revoke access</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                            <tr>
                                
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->fname . ' ' . $user->lname }}</td>
                                <td>{{ $user->company_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->phone_number }}</td>
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
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete-form{{ $user->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <form id="delete-form{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                        <a href="{{route('account.show',$user)}}"><i class='bx bx-show'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                
            </div>
        </div>
    </div>
    
</div>

@endsection

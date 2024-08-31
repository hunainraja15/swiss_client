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
    <form action="{{route('user.status')}}" method="POST" id="bulkUpdateForm">
        @csrf
    <div class="card mt-5">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">User List</h5>
            <div class=" ">
                <button type="submit" class="btn btn-primary m-3 btn-change-status">Change Status</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="form-check-input" id="select-all"></th>
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
                                <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="user-checkbox form-check-input"></td>
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
                                        <div class="dropdown-menu dropdown-menu-end">
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
                            @endforeach
                        </tbody>
                    </table>
                   
                
            </div>
        </div>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    // Hide the button initially
    const changeStatusButton = document.querySelector('.btn-change-status');
    changeStatusButton.style.display = 'none';

    // Select all checkboxes
    const selectAllCheckbox = document.getElementById('select-all');
    const userCheckboxes = document.querySelectorAll('.user-checkbox');

    // Function to toggle the visibility of the Change Status button
    function toggleChangeStatusButton() {
        const anyChecked = Array.from(userCheckboxes).some(cb => cb.checked);
        changeStatusButton.style.display = anyChecked ? 'inline-block' : 'none';
    }

    // Handle "Select All" checkbox
    selectAllCheckbox.addEventListener('click', function() {
        userCheckboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
        toggleChangeStatusButton();
    });

    // Handle individual checkboxes
    userCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else if (Array.from(userCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true;
            }
            toggleChangeStatusButton();
        });
    });
});

</script>
@endsection

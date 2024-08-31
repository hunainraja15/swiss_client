@extends('layouts.app')

@section('content')
<style>
    i {
        margin-right: 1rem;
    }
   
    .folder-card {
        position: relative; /* Position relative for dropdown positioning */
    }
</style>

<div class="container mt-5">
    
    <div class="row mt-3"> <!-- Added row for better layout -->
        
        <!-- Repeated Card Block -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center"> <!-- Adjust for header layout -->
                    <h5 class="card-title">Folders</h5>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        New Folder
                    </button>
                </div>
                <div class="col-12 mb-4"> <!-- Adjust column size and margin-bottom -->
                   <table class="table">
                     @forelse ($folders as $folder)
                    <div class="card folder-card border-primary mt-3 border">
                        <div class="card-body d-flex align-items-center">
                            <!-- Folder Icon -->
                            <div class="d-flex align-items-center flex-grow-1">
                                <i class='bx bxs-folder fa-2x'></i> <!-- Folder Icon with Font Awesome -->
                                <span class="ml-2">{{ $folder->name }}</span>
                            </div>
                            <!-- Dropdown Menu -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-{{ $folder->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $folder->id }}">
                                    <li><a class="dropdown-item" href="{{route('folder.open', $folder)}}" >Open Folder</a></li>
                                    <li><a class="dropdown-item" href="{{route('folder.delete',$folder)}}">Delete Folder</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="d-flex justify-content-center">
                        folder not found
                    </div>
                    @endforelse
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Folder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('folder.store') }}" method="POST" class="form">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Folder Name" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

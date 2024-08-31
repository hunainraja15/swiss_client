@extends('layouts.app')

@section('content')
<style>
    i {
        margin-right: 1rem;
    }
    
    .files-card {
        position: relative; /* Position relative for dropdown positioning */
    }
    #extension{
        width: 10px;
    }
</style>

<div class="container mt-5">
    <div class="row"> <!-- Added row for better layout -->
        <!-- Repeated Card Block -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center"> <!-- Adjust for header layout -->
                    <h5 class="card-title">Files</h5>
                    <!-- Button to trigger modal -->
                   
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Upload Files
                    </button>
                   
                   
                </div>
               
                <div class="col-12 mb-4"> <!-- Adjust column size and margin-bottom -->
                    @forelse ($files as $file)
                    <div class="card files-card border-primary mt-3 border">
                        <div class="card-body d-flex align-items-center">
                            <!-- File Icon -->
                         
                            <div class="d-flex align-items-center flex-grow-1">
                                
                                <i class='bx bxs-file-{{ $file->extension ?? 'blank'}}'></i> 
                                <span class="ml-2">{{ $file->name }}</span>
                            </div>
                            <!-- Dropdown Menu -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-{{ $file->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $file->id }}">
                                    <li><a class="dropdown-item" href="{{route('folder.open', $file)}}" >Open File</a></li>
                                    <li><a class="dropdown-item" href="{{route('file.delete',$file)}}">Delete File</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="d-flex justify-content-center">
                        files not found
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!--Upload File Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New File</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('file.store') }}" method="POST" class="form"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="folder_id" value="{{$folderId}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name"  required />
                    </div>
                    <div class="mb-3">
                        <label for="follow-up" class="form-label">Follow-up <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="follow_up"  required />
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file"  required />
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

@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Leader</title>
    @else
        <title>Add Leader</title>
    @endif
@stop

@section('main-content')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                        <div class="breadcrumb-body">
                            <h5 class="card-title text-primary">
                                @if($id > 0)
                                    Edit Leader
                                @else
                                    Add Leader
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-leader')}}">All Leader</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Leader
                                        @else
                                            Add Leader
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.leader_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name"><span class="text-danger">*</span>Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Leader Name" 
                            value="{{ $name ? $name : old('name') }}"  required/>
                          </div>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Upload Photo</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="photo" id="photo" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($photo != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Gallery/'.$photo) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="designation"><span class="text-danger">*</span>Designation</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Leader Designation" 
                            value="{{ $designation ? $designation : old('designation') }}"  required/>
                          </div>
                        </div>
                        @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="des"><span class="text-danger">*</span>Description</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="des" id="des" placeholder="Enter Description" required>{{ $des ? $des : old('des') }}</textarea>
                          </div>
                        </div>
                        @error('des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="hidden" name="leader_id" value="{{ $id }}">
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>

                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

@stop
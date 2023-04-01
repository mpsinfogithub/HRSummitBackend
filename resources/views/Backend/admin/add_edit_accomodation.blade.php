@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Stay</title>
    @else
        <title>Add Stay</title>
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
                                    Edit Stay
                                @else
                                    Add Stay
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-accomodation')}}">All Stay</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Stay
                                        @else
                                            Add Stay
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
                      <form action="{{route('admin.accomodation_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title"><span class="text-danger">*</span>Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" 
                            value="{{ $title ? $title : old('title') }}"  required/>
                          </div>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_title"><span class="text-danger">*</span>Sub Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title" 
                            value="{{ $sub_title ? $sub_title : old('sub_title') }}"  required/>
                          </div>
                        </div>
                        @error('sub_title')
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
                                
                                    <img src="{{ url('storage/uploads/Accomodation/'.$photo) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="check_in"><span class="text-danger">*</span>Check In</label>
                          <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="check_in" id="check_in" placeholder="Enter Check In" 
                            value="{{ $check_in ? $check_in : old('check_in') }}"  required/>
                          </div>
                        </div>
                        @error('check_in')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="check_out"><span class="text-danger">*</span>Check Out</label>
                          <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="check_out" id="check_out" placeholder="Enter Check Out" 
                            value="{{ $check_out ? $check_out : old('check_out') }}"  required/>
                          </div>
                        </div>
                        @error('check_out')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="contact"><span class="text-danger">*</span>Contact No.</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact No." 
                            value="{{ $contact ? $contact : old('contact') }}"  required/>
                          </div>
                        </div>
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="google_map"><span class="text-danger">*</span>Google Map</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="google_map" id="google_map" placeholder="Enter Google Map" required>{{ $google_map ? $google_map : old('google_map') }}</textarea>
                          </div>
                        </div>
                        @error('google_map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="hidden" name="accomodation_id" value="{{ $id }}">
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
@extends('Backend/admin/includes/layout')

@section('title')
    <title>About</title>
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
                                About
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active">
                                        About
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
                      <form action="{{route('admin.about_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if(!isset($about->photo)) { ?><span class="text-danger">*</span><?php } ?>Upload Photo</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="photo" id="photo" <?php if(!isset($about->photo)) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($about->photo != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Gallery/'.$about->photo) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="des_about"><span class="text-danger">*</span>Description</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="des_about" id="des_about" placeholder="Enter Description" required>{{ $about->des ? $about->des : old('des_about') }}</textarea>
                          </div>
                        </div>
                        @error('des_about')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
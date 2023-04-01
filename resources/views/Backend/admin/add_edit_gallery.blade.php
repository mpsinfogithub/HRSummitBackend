@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Gallery</title>
    @else
        <title>Add Gallery</title>
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
                                    Edit Gallery
                                @else
                                    Add Gallery
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-gallery')}}">All Gallery</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Gallery
                                        @else
                                            Add Gallery
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
                      <form action="{{route('admin.gallery_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Upload Photo / Video</label>
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
                                
                                    <img src="{{ url('storage/uploads/Gallery/'.$photo) }}" class="rounded" width="150" height="150" >
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><span class="text-danger">*</span>Select Type</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="type" required>
                                <option value="gallery">Select</option>
                                <option value="gallery" <?php if($type == 'gallery'){ echo "selected"; } ?>>Gallery</option>
                                <option value="carousel" <?php if($type == 'carousel'){ echo "selected"; } ?>>Carousel</option>
                                <option value="sponsor" <?php if($type == 'sponsor'){ echo "selected"; } ?>>Sponsor</option>
                            </select>
                          </div>
                        </div>
                        <input type="hidden" name="gallery_id" value="{{ $id }}">
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
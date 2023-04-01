@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Video</title>
    @else
        <title>Add Video</title>
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
                                    Edit Video
                                @else
                                    Add Video
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-video')}}">All Video</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Video
                                        @else
                                            Add Video
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
                      <form action="{{route('admin.video_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Upload Thumbnail</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="thumbnail" id="thumbnail" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($thumbnail != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                    
                                    <img src="{{ url('storage/uploads/Gallery/'.$thumbnail) }}" class="rounded" width="150" height="150" >
                              
                              </div>
                          </div>
                        @endif
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Upload Video</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="video" id="video" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($video != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('storage/uploads/Gallery/'.$video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                              
                              </div>
                          </div>
                        @endif
                       
                        <input type="hidden" name="video_id" value="{{ $id }}">
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
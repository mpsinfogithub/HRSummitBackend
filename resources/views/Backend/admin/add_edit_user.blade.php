@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit User</title>
    @else
        <title>Add User</title>
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
                                    Edit User
                                @else
                                    Add User
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-user')}}">All User</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit User
                                        @else
                                            Add User
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
                      <form action="{{route('admin.user_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name"><span class="text-danger">*</span>Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name" 
                            value="{{ $name ? $name : old('name') }}"  required/>
                          </div>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="email"><span class="text-danger">*</span>Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter User Email" 
                            value="{{ $email ? $email : old('email') }}"  required/>
                          </div>
                        </div>
                        @error('email')
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
                                
                                    <img src="{{ url('storage/uploads/User/'.$photo) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="phone"><span class="text-danger">*</span>Phone</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter User Phone" 
                            value="{{ $phone ? $phone : old('phone') }}"  required/>
                          </div>
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="phone"><span class="text-danger">*</span>Select Accomodation</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="accomodation_id">
                                <option value="">Select</option>
                                @foreach($accomodation as $row)
                                    <option value="{{ $row->id }}" <?php if($row->id == $accomodation_id){ echo "selected"; } ?>>{{ $row->title }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        @error('accomodation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="room_no"><span class="text-danger">*</span>Room No</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="room_no" id="room_no" placeholder="Enter Room No" 
                            value="{{ $room_no ? $room_no : old('room_no') }}"  required/>
                          </div>
                        </div>
                        @error('room_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="password"><span class="text-danger">*</span>Password</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter User Password" 
                            value="{{ $password ? $password : old('password') }}"  required/>
                          </div>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="hidden" name="user_id" value="{{ $id }}">
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

            <script>
                $(document).ready( function () {
                
                    CKEDITOR.replace('des');

                } );

                </script>

@stop
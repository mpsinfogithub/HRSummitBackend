@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Delegate</title>
    @else
        <title>Add Delegate</title>
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
                                    Edit Delegate
                                @else
                                    Add Delegate
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-deligate')}}">All Delegate</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Delegate
                                        @else
                                            Add Delegate
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
                      <form action="{{route('admin.deligate_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="deligate_name"><span class="text-danger">*</span>Delegate Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="deligate_name" id="deligate_name" placeholder="Enter Delegate Name" 
                            value="{{ $deligate_name ? $deligate_name : old('deligate_name') }}"  required/>
                          </div>
                        </div>
                        @error('deligate_name')
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
                        @php
                            $deligate_detail_id = 1
                        @endphp
                        <div class="row mb-3">
                            <a href="javascript:void(0);" class="btn btn-success w-15" onclick="add_deligate_detail()"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Delegate Events</label>
                          <div class="col-sm-10" id="deligate_detail_body">
                            @if($id == 0)
                                <div class="input-group mb-3" id="deligate_detail_{{ $deligate_detail_id++ }}">
                                    <input type="text" class="form-control" name="name[]" placeholder="Enter Name" required>
                                    <input type="text" class="form-control" name="company[]" placeholder="Enter Company" required>
                                    <input type="text" class="form-control" name="designation[]" placeholder="Enter Designation" required>
                                    <input type="text" class="form-control" name="email[]" placeholder="Enter Email" required>
                                    <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" required>
                                    <input type="hidden" name="deligate_detail_id[]" value="0">
                                </div>
                            @else
                                @foreach($all_deligate->deligate_detail as $key=>$row)
                                  <div class="input-group mb-3" id="deligate_detail_{{ $deligate_detail_id }}">
                                     <input type="text" class="form-control" name="name[]" placeholder="Enter Name" value="{{ $row->name }}" required>
                                     <input type="text" class="form-control" name="company[]" placeholder="Enter Company" value="{{ $row->company }}" required>
                                     <input type="text" class="form-control" name="designation[]" placeholder="Enter Designation" value="{{ $row->designation }}" required>
                                     <input type="text" class="form-control" name="email[]" placeholder="Enter Email" value="{{ $row->email }}" required>
                                     <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" value="{{ $row->phone }}" required>
                                      @if($key > 0)
                                          <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_deligate_detail({{ $row->id }},{{ $deligate_detail_id++ }})">X</a>
                                      @else
                                          @php
                                            $deligate_detail_id++
                                          @endphp
                                      @endif
                                      <input type="hidden" name="deligate_detail_id[]" value="{{ $row->id }}">
                                  </div>
                                @endforeach
                            @endif
                          </div>
                        </div>
                        <input type="hidden" name="deligate_id" value="{{ $id }}">
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
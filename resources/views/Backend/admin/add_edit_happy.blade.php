@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Happy To Help</title>
    @else
        <title>Add Happy To Help</title>
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
                                    Edit Happy To Help
                                @else
                                    Add Happy To Help
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-happy')}}">All Happy To Help</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Happy To Help
                                        @else
                                            Add Happy To Help
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
                      <form action="{{route('admin.happy_add_edit')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title"><span class="text-danger">*</span>Start Date</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" 
                            value="{{ $title ? $title : old('title') }}"  required/>
                          </div>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @php
                            $happy_detail_id = 1
                        @endphp
                        <div class="row mb-3">
                            <a href="javascript:void(0);" class="btn btn-success w-15" onclick="add_happy_detail()"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Happy To Help Details</label>
                          <div class="col-sm-10" id="happy_detail_body">
                            @if($id == 0)
                                <div class="input-group mb-3" id="happy_detail_{{ $happy_detail_id++ }}">
                                    <input type="text" class="form-control" name="name[]" placeholder="Enter Name" required>
                                    <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" required>
                                    <input type="hidden" name="happy_detail_id[]" value="0">
                                </div>
                            @else
                                @foreach($all_happy->happy_detail as $key=>$row)
                                  <div class="input-group mb-3" id="happy_detail_{{ $happy_detail_id }}">
                                     <input type="text" class="form-control" name="name[]" placeholder="Enter End" value="{{ $row->name }}" required>
                                     <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" value="{{ $row->phone }}" required>
                                      @if($key > 0)
                                          <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_happy_detail({{ $row->id }},{{ $happy_detail_id++ }})">X</a>
                                      @else
                                          @php
                                            $happy_detail_id++
                                          @endphp
                                      @endif
                                      <input type="hidden" name="happy_detail_id[]" value="{{ $row->id }}">
                                  </div>
                                @endforeach
                            @endif
                          </div>
                        </div>
                        <input type="hidden" name="happy_id" value="{{ $id }}">
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
@extends('Backend/admin/includes/layout')

@section('title')
    <title>Minute</title>
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
                                Minute  
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active">
                                        Minute
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
                      <form action="{{route('admin.minute_add_edit')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title"><span class="text-danger">*</span>Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" 
                            value="{{ $minute->title ? $minute->title : old('title') }}"  required/>
                          </div>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="summit_date"><span class="text-danger">*</span>Date</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="summit_date" id="summit_date" placeholder="Enter Summit Date" 
                            value="{{ $minute->summit_date ? $minute->summit_date : old('summit_date') }}"  required/>
                          </div>
                        </div>
                        @error('summit_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="venue"><span class="text-danger">*</span>Venue</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="venue" id="venue" placeholder="Enter Venue" 
                            value="{{ $minute->venue ? $minute->venue : old('venue') }}"  required/>
                          </div>
                        </div>
                        @error('venue')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="des_minute"><span class="text-danger">*</span>Description</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="des_minute" id="des_minute" placeholder="Enter Description" required>{{ $minute->des ? $minute->des : old('des_minute') }}</textarea>
                          </div>
                        </div>
                        @error('des_minute')
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
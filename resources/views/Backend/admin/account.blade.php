@extends('Backend/admin/includes/layout')

@section('title')
   <title>Account</title>
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
                                Account
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active">
                                        Account
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"><i class="menu-icon tf-icons bx bxs-user-account"></i>Profile</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="menu-icon tf-icons bx bxs-lock"></i>Change Password</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          
                          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.account_process')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="no_of_hr_summit"><span class="text-danger">*</span>HR Summit No</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_of_hr_summit" id="no_of_hr_summit" placeholder="Enter HR Summit No" 
                            value="{{ $account->no_of_hr_summit }}"  required/>
                          </div>
                        </div>
                        @error('no_of_hr_summit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="place_name"><span class="text-danger">*</span>Place Name</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              class="form-control"
                              name="place_name"
                              id="place_name"
                              placeholder="Enter Place Name"
                              value="{{ $account->place_name }}" 
                              required
                            />
                          </div>
                        </div>
                        @error('place_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="wp_link"><span class="text-danger">*</span>Whatsapp Community Link</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                name="wp_link"
                                id="wp_link"
                                class="form-control"
                                placeholder="Enter Whatsapp Commutnity Link"
                                aria-label="Enter Contact Number"
                                value="{{ $account->whatsapp_community_link }}" 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        @error('wp_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="agenda_title"><span class="text-danger">*</span>Agenda Title</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                name="agenda_title"
                                id="agenda_title"
                                class="form-control"
                                placeholder="Enter Agenda Title"
                                aria-label="Enter Agenda Title"
                                value="{{ $account->agenda_title }}" 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        @error('agenda_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="minute_status"><span class="text-danger">*</span>Minute Status</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <select class="form-control" name="minute_status" required>
                                  <option value="">Select</option>
                                  <option value="1" <?php if($account->minute_status == 1){ echo "selected"; } ?>>Active</option>
                                  <option value="0" <?php if($account->minute_status == 0){ echo "selected"; } ?>>Inactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Upload App Logo</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="app_logo" id="app_logo">
                          </div>
                        </div>
                        @error('app_logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($account->app_logo != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Gallery/'.$account->app_logo) }}" class="rounded" width="150" height="150" >
                              
                              </div>
                          </div>
                        @endif
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Upload Host Logo</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="host_logo" id="host_logo">
                          </div>
                        </div>
                        @error('host_logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($account->host_logo != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Gallery/'.$account->host_logo) }}" class="rounded" width="150" height="150" >
                              
                              </div>
                          </div>
                        @endif
      
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                 </div>
                          
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                        </div>
                        <form action="{{route('admin.change_password')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="current_password"><span class="text-danger">*</span>Current Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password" required/>
                              </div>
                            </div>
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="new_password"><span class="text-danger">*</span>New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" required/>
                              </div>
                            </div>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="retype_new_password"><span class="text-danger">*</span>Retype New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="retype_new_password" id="retype_new_password" placeholder="Retype New Password" required/>
                              </div>
                            </div>
                            @error('retype_new_password')
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
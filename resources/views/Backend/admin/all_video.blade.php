@extends('Backend/admin/includes/layout')

@section('title')
    <title>All Video</title>
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
                            <h5 class="card-title text-primary">All Video</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">All Video</li>
                              </ol>
                            </nav>
                          </div>
                          <a href="{{url('admin/add-video')}}" class="btn btn-success btn-alignment"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                          <br>
                          <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped text-center" id="myTable">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Video</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @php
                        $count = 1
                    @endphp
                    <tbody class="table-border-bottom-0">
                      @if(isset($all_video[0]))
                        @foreach($all_video as $row)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('storage/uploads/Gallery/'.$row->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>
                                @if($row->status == 1)
                                                                <a href="{{url('admin/change-video-status/'.'0'.'/'.$row->id)}}" 
                                                                class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Active</span>">
                                                                    <i class='bx bxs-check-square text-success'></i>
                                                                    </a> &nbsp;
                                                            @else
                                                                <a href="{{url('admin/change-video-status/'.'1'.'/'.$row->id)}}" 
                                                                class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Inactive</span>">
                                                                <i class='bx bxs-x-square text-danger'></i>
                                                                </a> &nbsp;
                                                            @endif
                                                            
                                                            <a href="{{url('admin/edit-video/'.$row->id)}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Edit</span>">
                                                                <i class='bx bxs-pencil text-warning'></i>
                                                                </a> &nbsp;
                                                                
                                                            <a href="{{url('admin/delete-video/'.$row->id)}}" 
                                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Delete</span>" onclick="return confirm('Are you sure ?');">
                                                                    <i class='bx bxs-trash text-danger'></i>
                                                                </a>
                                </td>
                            </tr>
                        @endforeach
                      @else
                        <tr>
                            <td colspan="5">No Data Available!</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
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
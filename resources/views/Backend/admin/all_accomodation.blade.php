@extends('Backend/admin/includes/layout')

@section('title')
    <title>All Stay</title>
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
                            <h5 class="card-title text-primary">All Stay</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">All Stay</li>
                              </ol>
                            </nav>
                          </div>
                          <a href="{{url('admin/add-accomodation')}}" class="btn btn-success btn-alignment"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                          <br>
                          <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped text-center" id="myTable">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @php
                        $count = 1
                    @endphp
                    <tbody class="table-border-bottom-0">
                      @if(isset($all_accomodation[0]))
                        @foreach($all_accomodation as $row)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    <img src="{{ url('storage/uploads/Accomodation/'.$row->photo) }}" class="rounded" width="150" height="150" >
                                </td>
                                <td>
                                @if($row->status == 1)
                                                                <a href="{{url('admin/change-accomodation-status/'.'0'.'/'.$row->id)}}" 
                                                                class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Active</span>">
                                                                    <i class='bx bxs-check-square text-success'></i>
                                                                    </a> &nbsp;
                                                            @else
                                                                <a href="{{url('admin/change-accomodation-status/'.'1'.'/'.$row->id)}}" 
                                                                class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Inactive</span>">
                                                                <i class='bx bxs-x-square text-danger'></i>
                                                                </a> &nbsp;
                                                            @endif
                                                            
                                                            <a href="{{url('admin/edit-accomodation/'.$row->id)}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Edit</span>">
                                                                <i class='bx bxs-pencil text-warning'></i>
                                                                </a> &nbsp;
                                                                
                                                            <a href="{{url('admin/delete-accomodation/'.$row->id)}}" 
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
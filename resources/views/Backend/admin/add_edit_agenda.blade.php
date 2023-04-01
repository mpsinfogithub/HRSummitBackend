@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Agenda</title>
    @else
        <title>Add Agenda</title>
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
                                    Edit Agenda
                                @else
                                    Add Agenda
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-agenda')}}">All Agenda</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Agenda
                                        @else
                                            Add Agenda
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
                      <form action="{{route('admin.agenda_add_edit')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="agenda"><span class="text-danger">*</span>Start Date</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Enter Agenda Start Date" 
                            value="{{ $start_date ? $start_date : old('start_date') }}"  required/>
                          </div>
                        </div>
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @php
                            $agenda_event_id = 1
                        @endphp
                        <div class="row mb-3">
                            <a href="javascript:void(0);" class="btn btn-success w-15" onclick="add_agenda_event()"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Agenda Events</label>
                          <div class="col-sm-10" id="agenda_event_body">
                            @if($id == 0)
                                <div class="input-group mb-3" id="agenda_event_{{ $agenda_event_id++ }}">
                                    <input type="time" class="form-control" name="begin[]" placeholder="Enter Begin" required>
                                    <input type="time" class="form-control" name="end[]" placeholder="Enter End" required>
                                    <input type="text" class="form-control" name="title[]" placeholder="Enter Title" required>
                                    <input type="hidden" name="agenda_event_id[]" value="0">
                                </div>
                            @else
                                @foreach($all_agenda->agenda_event as $key=>$row)
                                  <div class="input-group mb-3" id="agenda_event_{{ $agenda_event_id }}">
                                     <input type="time" class="form-control" name="begin[]" placeholder="Enter Begin" value="{{ $row->begin }}" required>
                                     <input type="time" class="form-control" name="end[]" placeholder="Enter End" value="{{ $row->end }}" required>
                                     <input type="text" class="form-control" name="title[]" placeholder="Enter Title" value="{{ $row->title }}" required>
                                      @if($key > 0)
                                          <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_agenda_event({{ $row->id }},{{ $agenda_event_id++ }})">X</a>
                                      @else
                                          @php
                                            $agenda_event_id++
                                          @endphp
                                      @endif
                                      <input type="hidden" name="agenda_event_id[]" value="{{ $row->id }}">
                                  </div>
                                @endforeach
                            @endif
                          </div>
                        </div>
                        <input type="hidden" name="agenda_id" value="{{ $id }}">
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
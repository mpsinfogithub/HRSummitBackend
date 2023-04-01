
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                Copyright ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script> 
                  <a href="{{url('/')}}" target="_blank">HRSummit</a> All Rights Reserved.
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @if($message = session('success'))

      <script>
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ $message }}",
            timer : 3000
          });
      </script>

    @endif

    @if($message = session('error'))

      <script>
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "{{ $message }}",
            timer : 3000
          });
      </script>

    @endif

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();

      } );

    </script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('admin_assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('admin_assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('admin_assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('admin_assets/js/dashboards-analytics.js')}}"></script>

    <script src="{{asset('admin_assets/snackbar/snackbar.min.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('admin_assets/ckfinder/ckfinder.js')}}"></script>

    <script>

      let agenda_event_id = 0;

      @if(isset($agenda_event_id))

            agenda_event_id = {{ $agenda_event_id }}

      function add_agenda_event()
      {

        $("#agenda_event_body").append(`<div class="input-group mb-3" id="agenda_event_{{ $agenda_event_id }}">
                                    <input type="time" class="form-control" name="begin[]" placeholder="Enter Begin" required>
                                    <input type="time" class="form-control" name="end[]" placeholder="Enter End" required>
                                    <input type="text" class="form-control" name="title[]" placeholder="Enter Title" required>
                                    <input type="hidden" name="agenda_event_id[]" value="0">
                                    <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_agenda_event(0,{{ $agenda_event_id++ }})">X</a>
                                </div>
        `);

        agenda_event_id++;

      }
      
      @endif

      function remove_agenda_event(agenda_event_id,id)
      {
          let con = confirm('Are you sure to delete this event ?');

          if(!con)
          {
            return false;
          }
          
          if(agenda_event_id !== 0)
          { 
            
              $.ajax({
                  url : "{{url('admin/delete-agenda-event')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : agenda_event_id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#agenda_event_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
            
          }
          else
          {
              $(`#agenda_event_${id}`).remove();
          }
          
      }

      let activity_event_id = 0;

      @if(isset($activity_event_id))

        activity_event_id = {{ $activity_event_id }}

      function add_activity_event()
      {

        $("#activity_event_body").append(`<div class="input-group mb-3" id="activity_event_{{ $activity_event_id }}">
                                    <input type="time" class="form-control" name="begin[]" placeholder="Enter Begin" required>
                                    <input type="time" class="form-control" name="end[]" placeholder="Enter End" required>
                                    <input type="text" class="form-control" name="activity_title[]" placeholder="Enter Title" required>
                                    <input type="date" class="form-control" name="activity_date[]" placeholder="Enter Activity Date" required>
                                    <input type="hidden" name="activity_event_id[]" value="0">
                                    <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_activity_event(0,{{ $activity_event_id++ }})">X</a>
                                </div>
        `);

        activity_event_id++;

      }

      @endif

      function remove_activity_event(activity_event_id,id)
      {
          let con = confirm('Are you sure to delete this event ?');

          if(!con)
          {
            return false;
          }
          
          if(activity_event_id !== 0)
          { 
            
              $.ajax({
                  url : "{{url('admin/delete-activity-event')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : activity_event_id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#activity_event_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
            
          }
          else
          {
              $(`#activity_event_${id}`).remove();
          }
          
      }

      let deligate_detail_id = 0;

      @if(isset($deligate_detail_id))

      deligate_detail_id = {{ $deligate_detail_id }}

      function add_deligate_detail()
      {

        $("#deligate_detail_body").append(`<div class="input-group mb-3" id="deligate_detail_{{ $deligate_detail_id }}">
        <input type="text" class="form-control" name="name[]" placeholder="Enter Name" required>
                                    <input type="text" class="form-control" name="company[]" placeholder="Enter Company" required>
                                    <input type="text" class="form-control" name="designation[]" placeholder="Enter Designation" required>
                                    <input type="text" class="form-control" name="email[]" placeholder="Enter Email" required>
                                    <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" required>
                                    <input type="hidden" name="deligate_detail_id[]" value="0">
                                    <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_deligate_detail(0,{{ $deligate_detail_id++ }})">X</a>
                                </div>
        `);

        deligate_detail_id++;

      }

      @endif

      function remove_deligate_detail(deligate_detail_id,id)
      {
          let con = confirm('Are you sure to delete this event ?');

          if(!con)
          {
            return false;
          }
          
          if(deligate_detail_id !== 0)
          { 
            
              $.ajax({
                  url : "{{url('admin/delete-deligate-detail')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : deligate_detail_id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#deligate_detail_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
            
          }
          else
          {
              $(`#deligate_detail_${id}`).remove();
          }
          
      }
      
      let happy_detail_id = 0;

      @if(isset($happy_detail_id))

        happy_detail_id = {{ $happy_detail_id }}

      function add_happy_detail()
      {

        $("#happy_detail_body").append(`<div class="input-group mb-3" id="happy_detail_{{ $happy_detail_id }}">
                                    <input type="text" class="form-control" name="name[]" placeholder="Enter Name" required>
                                    <input type="text" class="form-control" name="phone[]" placeholder="Enter Phone" required>
                                    <input type="hidden" name="happy_detail_id[]" value="0">
                                    <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_happy_detail(0,{{ $happy_detail_id++ }})">X</a>
                                </div>
        `);

        happy_detail_id++;

      }

      @endif

      function remove_happy_detail(activity_event_id,id)
      {
          let con = confirm('Are you sure to delete this Detail ?');

          if(!con)
          {
            return false;
          }
          
          if(happy_detail_id !== 0)
          { 
            
              $.ajax({
                  url : "{{url('admin/delete-happy-detail')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : happy_detail_id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#happy_detail_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
            
          }
          else
          {
              $(`#happy_detail_${id}`).remove();
          }
          
      }
    </script>

  </body>
</html>

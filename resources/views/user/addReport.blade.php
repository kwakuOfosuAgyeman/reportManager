<x-user-layout>
     <div class="section-body mt-3">
          <div class="container-fluid">
              <div class="row clearfix">
                  <div class="col-lg-12">
                      <div class="mb-4">
                          <h4>Welcome {{Auth::guard('web')->user()->name}}</h4>
                          <small>Add Reports Here</small>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">
                  <div class="col-12 col-sm-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Add Report Form</h3>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                   <form action="{{route('user.addReport')}}" id="basic-form" method="post" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <label>Report title</label>
                                            <input type="text" name="report_title" class="form-control" required>
                                        </div>
                                   
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="5" cols="30" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>File name</label>
                                            <input type="text" name="file_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>File location</label>
                                            <input type="text" name="location" class="form-control" required>
                                        </div>
                                       
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
  
     </div>
  
     @section('page-script')
     <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/knobjs.bundle.js') }}"></script>

     <script src="{{ asset('assets/js/core.js') }}"></script>
     <script src="{{ asset('assets/js/page/index.js') }}"></script>
     @stop
    
</x-user-layout>

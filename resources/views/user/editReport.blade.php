<x-user-layout>
     <div class="section-body mt-3">
          <div class="container-fluid">
              <div class="row clearfix">
                  <div class="col-lg-12">
                      <div class="mb-4">
                          <h4>Welcome {{Auth::guard('web')->user()->name}}</h4>
                          <small>Edit Reports Here</small>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">
                  <div class="col-12 col-sm-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Edit Report Form</h3>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                   <form action="{{ route('user.updateReport', $report->id) }}" id="basic-form" method="post" novalidate>
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Report title</label>
                                            <input type="text" name="report_title" value="{{ $report->report_title }}" class="form-control" required>
                                        </div>
                                   
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="5" cols="30" required>{{ $report->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>File name</label>
                                            <input type="text" name="file_name" value="{{ $report->file_name }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>File location</label>
                                            <input type="text" name="location" value="{{ $report->location }}" class="form-control" required>
                                        </div>
                                       
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update</button>
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

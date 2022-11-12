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
                              <h3 class="card-title">Add Column Form</h3>
                          </div>
                          @if(session()->has('error'))
                          <div class="alert alert-danger">{{ session()->get('error') }}</div>
                          @enderror
                          <div class="card-body">
                                    <form action="{{route('user.addNewCC')}}" id="basic-form" method="post" novalidate>
                                        @csrf
                                        <div style="display: none">
                                            <label class="form-label">Column Id</label>
                                            <input type="text" name="report_id" class="form-control " value="{{$report->id}}" readonly>

                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Report name</label>
                                            <input type="text" name="report_name" class="form-control disabled" value="{{$report->report_title}}" readonly>

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Column name</label>
                                            <input type="text" name="custom_column" value="{{old('custom_column')}}" class="form-control @error('custom-column') is-invalid @enderror" id="column-name" required>

                                        </div>
                                        @error('custom_column')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" cols="30" required>{{old('description')}}</textarea>

                                        </div>
                                        @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <select class="form-control custom-select @error('type') is-invalid @enderror" name="type" id="type">
                                                <option value="character">Character</option>
                                                <option value="combobox list">Combobox List</option>
                                                <option value="numeric">Numeric</option>
                                                <option value="date">Date</option>
                                                <option value="computed column">Computed Column</option>
                                            </select>

                                        </div>
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <div id="combobox-values">
                                            <div class="form-group">
                                                <label class="form-label" for="">Column Name</label>
                                                <input type="text" class="form-control disabled" id="custom-column" value="" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="">Value Code</label>
                                                <input type="text" name="value_code" class="form-control @error('value_code') is-invalid @enderror" id="input-tags" value="{{old('value_code')}}">

                                            </div>
                                            @error('value_code')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            <div class="form-group">
                                                <label class="form-label" for="">Value Description</label>
                                                <input type="text" name="value_description" class="form-control @error('value_description') is-invalid @enderror" value="{{old('value_description')}}">

                                            </div>
                                            @error('value_description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Size</label>
                                            <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" required>

                                        </div>
                                        @error('size')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        <div class="form-group">
                                            <label class="form-label">Decimal Size</label>
                                            <input type="text" name="decimal_size" class="form-control @error('decimal_size') is-invalid @enderror" required>

                                        </div>
                                        @error('decimal_size')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        {{-- <div class="form-group">
                                            <label>Manual Editing</label>

                                            <input type="text" name="manual_editing" class="form-control" required>
                                        </div> --}}

                                        <div class="form-group">
                                            <label class="form-label">Manual Editing</label>
                                            <select class="form-control custom-select @error('manual_editing') is-invalid @enderror" name="manual_editing">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>

                                        </div>
                                        @error('manual_editing')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        <div class="form-group">
                                            <label class="form-label">Mass Editing</label>
                                            <select class="form-control custom-select @error('mass_update') is-invalid @enderror" name="mass_update">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>

                                        </div>
                                        @error('mass_update')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                        {{-- <div class="form-group">
                                            <label>Mass Update</label>
                                            <input type="text" name="mass_update" class="form-control" required>
                                        </div> --}}

                                        </br>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                              </div>
                          </div>
                  </div>
              </div>

          </div>

     </div>

     @section('page-script')
     {{-- <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script> --}}
     <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/knobjs.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/selectize.bundle.js') }}"></script>
     <script src="{{ asset('assets/js/core.js') }}"></script>
     {{-- <script src="{{ asset('assets/js/page/index.js') }}"></script> --}}

     <script>

        $(document).ready(function () {
            $('#combobox-values').hide();
            $('#type').change(function () {

                if($(this).val() == "combobox list"){
                    //console.log($(this).val());
                    $('#combobox-values').show();

                }
                if($(this).val() !== "combobox list"){
                    $('#combobox-values').hide();
                }
            });
            $('#column-name').on("input",function(){
                $('#custom-column').val($('#column-name').val());
            });
            $('#input-tags').selectize({
                delimiter: ',',
                persist: false,
                create: function (input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });

        });
    </script>
     @stop

</x-user-layout>

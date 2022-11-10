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
                                <form action="{{ route('user.updateColumn') }}" id="basic-form" method="post" novalidate>
                                    @csrf
                                    @method('PUT')

                                    @php
                                        $rep = $report_col->getOriginal(); // report column data
                                        $report = $report->getOriginal();
                                    @endphp

                                    {{-- @dd($rep['manual_editing']) --}}
                                    <div style="display: none">
                                        <label>Column Id</label>
                                        <input type="text" name="id" class="form-control" value="{{$rep['id']}}" readonly>
                                    </div>

                                    <div style="display: none">
                                        <label>Report name</label>
                                        <input type="text" name="report_id" class="form-control disabled" value="{{$rep['report_id']}}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Report name</label>
                                        <input type="text" name="report_name" class="form-control disabled" value="{{$report['report_title']}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Column name</label>
                                        <input type="text" name="custom_column" class="form-control" value="{{$rep['custom_column']}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="5" cols="30" required>{{$rep['description']}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control custom-select" id="type" name="type" value="{{$rep['type']}}">
                                            <option value="character">Character</option>
                                            <option value="combobox list">Combobox List</option>
                                            <option value="numeric">Numeric</option>
                                            <option value="date">Date</option>
                                            <option value="computed column">Computed Column</option>
                                        </select>
                                    </div>
                                    <div id="combobox-values">
                                        <div class="form-group">
                                            <label for="">Column Name</label>
                                            <input type="text" name="value_code" id="" value="{{$rep['custom_column']}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Value Code</label>
                                            <input type="text" name="value_code" id="input-tags">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Value Description</label>
                                            <input type="text" name="description">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" name="size" class="form-control" value="{{$rep['size']}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Decimal Size</label>
                                        <input type="text" name="decimal_size" class="form-control" value="{{$rep['decimal_size']}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Manual Editing</label>
                                        <select class="form-control custom-select" name="manual_editing" value="{{$rep['manual_editing']}}">

                                            @if ($rep['manual_editing'] == 1)
                                                <option value="{{$rep['manual_editing']}}" selected>Yes</option>
                                                <option value="0">No</option>
                                            @elseif($rep['manual_editing'] == 0)
                                                <option value="1">Yes</option>
                                                <option value="{{$rep['manual_editing']}}" selected>No</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Mass Update</label>
                                        <select class="form-control custom-select" name="mass_update" value="{{$rep['mass_update']}}">
                                            @if ($rep['mass_update'] == 1)
                                                <option value="{{$rep['mass_update']}}" selected>Yes</option>
                                                <option value="0">No</option>
                                            @elseif($rep['mass_update'] == 0)
                                                <option  value="1">Yes</option>
                                                <option  value="{{$rep['mass_update']}}" selected>No</option>
                                            @endif
                                        </select>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Edit</button>
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
    <script>

        $(document).ready(function () {
            $('#combobox-values').hide();
            $('#type').change(function () {
                if($(this).val() === "combobox list"){
                    $('combobox-values').show();
                }
                if($(this).val() !== "combobox list"){
                    $('combobox-values').hide();
                }
            });
        });
    </script>
    @stop


</x-user-layout>

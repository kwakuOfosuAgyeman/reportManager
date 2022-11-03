<x-user-layout>
    
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h4>Welcome {{Auth::guard('web')->user()->name}}</h4>
                        <small>View Your Reports Here</small>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="justify-content: space-between">
                            <h3 class="card-title">{{$report->report_title}}</h3>
                            <a class="card-title" href="" class="btn btn-primary">Print Report</a>
                        </div>
                        {{-- @dd($return_str[0]) --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>...</th>
                                            @foreach (array_values(array_keys($return_str[0])) as $item)
                                                <th>{{$item}}</th>
                                            @endforeach                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($return_str as $item)
                                            <tr>
                                                <td>...</td>
                                                @foreach ($item as $data)
                                                    {{-- <td>{{$data}}</td> --}}
                                                    <td>{{strlen($data) > 50 ? substr($data,0,50)."..." : $data}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
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

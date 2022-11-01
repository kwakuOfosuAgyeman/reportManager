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
                            <h3 class="card-title">{{$report->report_title}}{{$data}}</h3>
                            <a class="card-title" href="" class="btn btn-primary">Print Report</a>
                        </div>
                        {{-- @dd($return_str) --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>...</th>
                                            <th>Report Title</th>
                                            <th>Description</th>
                                            <th>File name</th>
                                            <th>Location</th>
                                            <th>...</th>
                                            <th>...</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($data as $item)
                                        <tr>
                                            <td>...</td>
                                            <td>{{$item->report_title}}</td>
                                            <td>{{strlen($item->description) > 50 ? substr($item->description,0,50)."..." : $item->description}}</td>
                                            <td>{{$item->file_name}}</td>
                                            <td>{{$item->location}}</td>
                                            <td><small><a href="{{ route('user.runReport',['id' => $item->id]) }}"> Run <i class="fe fe-chevron-right" data-toggle="tooltip" title="run"></i></a></small></td>
                                            <td><small><a href="{{ route('user.editReport',['id' => $item->id]) }}"> Edit <i class="fe fe-edit" data-toggle="tooltip" title="fe fe-edit"></i></a></small></td>
                                            <td><small><form action="{{route('user.deleteReport')}}" method="post"> @csrf @method('DELETE') <input type="hidden" name="id" value="{{$item->id}}"> <button type="submit" style="background: none; border: none;"> Delete <i class="fe fe-trash" data-toggle="tooltip" title="fe fe-trash"></i></button> </form> </small></td>
                                        </tr>
                                        @endforeach --}}
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

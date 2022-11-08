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
                            <h3 class="card-title" data-bs-toggle="tooltip" title="{{$report->description}}">{{$report->report_title}}</h3>
                            <div class="card-options">
                                <button class="btn btn-primary">Print Report</button>
                                {{-- <button class="btn btn-dark ml-2"> Menu options</button> --}}
                                <a href="{{route('user.columnMaintenance', ['id' => $report->id]) }}"><button class="btn btn-dark"> Menu options</button></a> 
                            </div>
                        </div>
                        
                        {{-- @dd($return_str) --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>...</th>
                                            @php
                                                $column_count = 0;
                                                $cust_col_count = 0
                                            @endphp
                                            @foreach (array_values(array_keys($return_str[0])) as $item)
                                                <th>{{$item}}</th>
                                                @php
                                                    $column_count ++;
                                                @endphp
                                            @endforeach    
                                            @if ($customColumns)
                                                @foreach ($customColumns as $cols)
                                                    @php
                                                        
                                                        $cols = $cols->getOriginal();
                                                    @endphp
                                                    <th>{{$cols['custom_column']}}</th>
                                                    @php
                                                        $cust_col_count ++;
                                                    @endphp
                                                @endforeach
                                            @endif                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $calc = 0;
                                            $column = 0;
                                            $calc_array = array_fill(0,$column_count, 0);
                                        @endphp

                                        @foreach ($return_str as $item)
                                            <tr>
                                                <td>...</td>
                                                @foreach ($item as $data)
                                                    
                                                    <td>{{strlen($data) > 50 ? substr($data,0,50)."..." : $data}}</td>
                                                    @php
                                                        if (is_numeric($data)) {
                                                            $calc_array[$column] = $calc_array[$column] + $data;
                                                        }else{
                                                            $calc_array[$column] = 0;
                                                        }
                                                        $column = $column + 1;
                                                    @endphp
                                                @endforeach
                                                @for ($i = 0; $i < $cust_col_count; $i++)
                                                    <td>...</td>
                                                @endfor
                                            </tr>
                                            @php
                                                $column = 0;
                                            @endphp
                                        @endforeach 

                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            @foreach ($calc_array as $num)
                                                @if ($num <= 0)     
                                                <td></td>
                                                @endif
                                                @if ($num > 0)     
                                                <td>{{$num}}</td>
                                                @endif
                                            @endforeach  
                                            
                                            @for ($i = 0; $i < $cust_col_count; $i++)
                                                <td></td>
                                            @endfor
                                        </tr>
                                        
                                            
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

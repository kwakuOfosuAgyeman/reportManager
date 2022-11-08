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
                              <h3 class="card-title">Report Table</h3>
                              <div class="card-options">
                                   <a href="{{route('user.addCustomColumn', ['id' => $report->id])}}"> <button class="btn btn-dark">Add Column</button>  </a>
                              </div>
                              </div>

                              {{-- @dd($report->getFillable()) --}}
     
                              <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                        <thead>
                                             <tr>
                                                  <th>...</th>
                                                  <th>Column Name</th>
                                                  <th>Description</th>
                                                  <th>Type</th>
                                                  <th>Size</th>
                                                  <th>Decimal size</th>
                                                  <th>Manual Editing?</th>
                                                  <th>Mass Update?</th>
                                                  <td>...</td>
                                                  <td>...</td>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             
                                             {{-- @dd($data) --}}

                                             {{-- @foreach (array_values(array_keys($data[0])) as $item)
                                             <tr>
                                                  <td>...</td>
                                                  <td>{{$item}}</td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                             </tr> 
                                                
                                            @endforeach   --}}
                                             
                                             @php
                                                 $reports = $report->getFillable()
                                             @endphp
                                             @foreach ($reports as $item)
                                                  <tr>
                                                       <td>...</td>
                                                       <td>{{$item}}</td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>     
                                             @endforeach

                                                  {{-- <tr>{{$customColumns}}</tr> --}}
                                             
                                             {{-- @dd($customColumns->getOriginal()) --}}

                                             {{-- @dd($customColumns) --}}
                                            
                                             @if ($customColumns)
                                                  @foreach ($customColumns as $col)
                                                  <tr class="text-center">
                                                       <td>...</td>
                                                       <td class="text-left">{{$col['custom_column']}}</td>
                                                       <td>{{strlen($col['description']) > 15 ? substr($col['description'],0,12)."..." : $col['description']}}</td>
                                                       <td>{{$col['type']}}</td>
                                                       <td>{{$col['size']}}</td>
                                                       <td>{{$col['decimal_size']}}</td>
                                                       <td>{{$col['manual_editing'] === 1 ? "Yes" : "No"}}</td>
                                                       <td>{{$col['mass_update'] === 1 ? "Yes" : "No"}}</td>
                                                       <td><small><a href="{{ route('user.editColumn',['id' => $col['id']]) }}"> Edit <i class="fe fe-edit" data-toggle="tooltip" title="fe fe-edit"></i></a></small></td>
                                                       <td><small><form action="" method="post"> @csrf @method('DELETE') <input type="hidden" name="id" value=""> <button type="submit" style="background: none; border: none;"> Delete <i class="fe fe-trash" data-toggle="tooltip" title="fe fe-trash"></i></button> </form> </small></td>
                                                  </tr> 
                                                      
                                                  @endforeach
                                                    
                                             @else
                                                  <tr>
                                                       Nothing
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
 
     @section('page-script')
     <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
     <script src="{{ asset('assets/bundles/knobjs.bundle.js') }}"></script>
 
     <script src="{{ asset('assets/js/core.js') }}"></script>
     <script src="{{ asset('assets/js/page/index.js') }}"></script>
     @stop
 
 </x-user-layout>
 
<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Adrenalin Sports <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">


        <ul class="metismenu">
            <li class="g_heading" style="color: black; font-size:small">Hr</li>
            <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.home')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.platformSetup')}}"><i class=""></i><span>Platform Setup</span></a></li>
            <li class="{{Request::segment(1) ==='sportsmanagement' ? 'active' : null }}" style="color: black; font-size:small">
                <a href="javascript:void(0)"><i class="fa fa-soccer-ball-o"></i><span> Sports Management</span></a>
                <ul>

                    {{-- <li class="{{ Request::segment(2) === 'coaches' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><span>Platform Setup</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'index3' ? 'active' : null }}"><a href="{{route('job.index3')}}">Academic Year</a></li>
                            <li class="{{ Request::segment(3) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Academic Calendar</a></li>
                            <li class="{{ Request::segment(3) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">Setup Report</a></li>
                        </ul>
                    </li> --}}
                    <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.sportsPortfolio')}}"><span>Sports Portfolio</span></a></li>
                    {{-- <li class="{{ Request::segment(2) === 'Athlete Portfolio' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><span>Sports Portfolio</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'index2' ? 'active' : null }}"><a href="{{route('project.index2')}}">Athletes</a></li>
                            <li class="{{ Request::segment(3) === 'list' ? 'active' : null }}"><a href="{{route('project.list')}}">Coaches</a></li>
                            <li class="{{ Request::segment(3) === 'ticket' ? 'active' : null }}"><a href="{{route('project.ticket')}}">Officials</a></li>
                            <li class="{{ Request::segment(3) === 'ticketdetails' ? 'active' : null }}"><a href="{{route('project.ticketdetails')}}">Volunteers</a></li>
                            <li class="{{ Request::segment(3) === 'taskboard' ? 'active' : null }}"><a href="{{route('project.taskboard')}}">Alumni</a></li>
                        </ul>
                    </li> --}}
                    <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.home')}}"><span>Health And Fitness</span></a></li>
                    {{-- <li class="{{ Request::segment(2) === 'healthAndfitness' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><span>Health And Fitness</span></a>
                        <ul>
                            <li class="{{Request::segment(3) === '' ? 'active': null}}"><a href="">Medical & Diet History</a></li>
                            <li class="{{Request::segment(3) === '' ? 'active': null}}"><a href="">Physical Exam</a></li>
                            <li class="{{Request::segment(3) === '' ? 'active': null}}"><a href="">Injury Management</a></li>
                            <li class="{{Request::segment(3) === '' ? 'active': null}}"><a href="">Reports</a></li>
                        </ul>

                    </li> --}}
                    <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.home')}}"><span>Trends and Analysis</span></a></li>
                    {{-- <li class="{{ Request::segment(2) === 'officials' ? 'active' : null }}">

                        <a href="javascript:void(0)" class=""><span>Trends and Analysis</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'login' ? 'active' : null }}"><a href="{{route('authentication.login')}}">Login</a></li>
                            <li class="{{ Request::segment(3) === 'register' ? 'active' : null }}"><a href="{{route('authentication.register')}}">Register</a></li>
                            <li class="{{ Request::segment(3) === 'forgotpassword' ? 'active' : null }}"><a href="{{route('authentication.forgotpassword')}}">Forgot password</a></li>
                            <li class="{{ Request::segment(3) === 'error404' ? 'active' : null }}"><a href="{{route('authentication.error404')}}">Error 404</a></li>
                            <li class="{{ Request::segment(3) === 'error500' ? 'active' : null }}"><a href="{{route('authentication.error500')}}">Error 500</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </li>


            {{-- <li class="g_heading" style="color: black; font-size:small"> Health And Fitness</li> --}}



        </ul>

    </nav>
</div>

{{--  <li class="g_heading">Hr</li>
            <li class="{{ Request::segment(1) === 'index' ? 'active' : null }}"><a href="{{route('sportsOfficial.home')}}"><span>Dashboard</span></a></li>
            <li class="g_heading">Sports Management</li>
            <li class="{{ Request::segment(1) === 'sports' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="">Sports Management</i></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'coaches' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fe fe-settings"></i><span>Platform Setup</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'index3' ? 'active' : null }}"><a href="{{route('job.index3')}}">Academic Year</a></li>
                            <li class="{{ Request::segment(3) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Academic Calendar</a></li>
                            <li class="{{ Request::segment(3) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">Setup Report</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::segment(2) === 'Athlete Portfolio' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-user"></i><span>Sports Portfolio</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'index3' ? 'active' : null }}"><a href="{{route('project.index2')}}">Athletes</a></li>
                            <li class="{{ Request::segment(3) === 'list' ? 'active' : null }}"><a href="{{route('project.list')}}">Coaches</a></li>
                            <li class="{{ Request::segment(3) === 'ticket' ? 'active' : null }}"><a href="{{route('project.ticket')}}">Officials</a></li>
                            <li class="{{ Request::segment(3) === 'ticketdetails' ? 'active' : null }}"><a href="{{route('project.ticketdetails')}}">Volunteers</a></li>
                            <li class="{{ Request::segment(3) === 'taskboard' ? 'active' : null }}"><a href="{{route('project.taskboard')}}">Alumni</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::segment(2) === 'officials' ? 'active' : null }}">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-area-chart"></i><span>Trends and Analysis</span></a>
                        <ul>
                            <li class="{{ Request::segment(3) === 'login' ? 'active' : null }}"><a href="{{route('authentication.login')}}">Login</a></li>
                            <li class="{{ Request::segment(3) === 'register' ? 'active' : null }}"><a href="{{route('authentication.register')}}">Register</a></li>
                            <li class="{{ Request::segment(3) === 'forgotpassword' ? 'active' : null }}"><a href="{{route('authentication.forgotpassword')}}">Forgot password</a></li>
                            <li class="{{ Request::segment(3) === 'error404' ? 'active' : null }}"><a href="{{route('authentication.error404')}}">Error 404</a></li>
                            <li class="{{ Request::segment(3) === 'error500' ? 'active' : null }}"><a href="{{route('authentication.error500')}}">Error 500</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

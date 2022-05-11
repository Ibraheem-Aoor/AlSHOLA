  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">

                  @can('jobs management')
                      <li class="active">
                          <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                      </li>
                      <li class="menu-title">Job Posts Managment</li><!-- /.menu-title -->
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Posting Management</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.all') }}">All Jobs</a>
                              </li>
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.latest') }}">New Jobs</a>
                              </li>
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.completed') }}">Completed
                                      Jobs</a></li>
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.completed') }}">Cancelled
                                      Jobs</a></li>
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.active') }}">Active Jobs</a>
                              </li>
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.pending') }}">Pending
                                      Jobs</a>
                              </li>
                          </ul>
                      </li>
                  @endcan
                  <li class="menu-title"></li><!-- /.menu-title -->


                  @can('users management')
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users Managmement</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li>
                                  <i class="menu-icon fa fa-users"></i>
                                  <a href="{{ route('users.all') }}"> All Users </a>
                              </li>
                              <li>
                                  <i class="menu-icon ti-user"></i>
                                  <a href="{{ route('employer.all') }}"> Employers </a>
                              </li>
                              <li>
                                  <i class="menu-icon ti-user"></i>
                                  <a href="{{ route('talent.all') }}"> Talents </a>
                              </li>
                              <li>
                                  <i class="menu-icon fa fa-plus"></i>
                                  <a href="{{ route('users.add') }}"> New User </a>
                              </li>

                          </ul>
                      </li>
                  @endcan



                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Applications Mangament</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="menu-icon fa fa-file-text"></i><a
                                      href="{{ route('admin.applications.all') }}">All Applications</a></li>
                              <li><i class="menu-icon fa fa-file-text"></i><a
                                      href="{{ route('admin.applications.medical') }}">Waiting For Medical</a></li>
                              <li><i class="menu-icon fa fa-file-text"></i><a
                                      href="{{ route('admin.applications.visa') }}">Waiting For Visa</a></li>
                          </ul>
                      </li>

                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Candidacy Orders</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="menu-icon fa fa-folder-o"></i><a
                                      href="{{ route('admin.candidacy.orders.all') }}">All Orders</a></li>
                          </ul>
                      </li>



                  @can('contact management')
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-phone"></i>Contact Queries</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="menu-icon fa fa-users"></i><a
                                      href="{{ route('admin.contacts.employers') }}">Employers Queries</a></li>
                              <li><i class="menu-icon fa fa-users"></i><a
                                      href="{{ route('admin.contacts.talents') }}">Talents Queries</a></li>
                              <li><i class="menu-icon fa fa-users"></i><a
                                      href="{{ route('admin.contacts.guests') }}">Guests Queries</a></li>
                          </ul>
                      </li>
                  @endcan

                  @can('roles management')
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa  fa-minus-circle"></i>Roles & Permessions</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li>
                                  <i class="fa fa-lock"></i>
                                  <a href="{{ route('roles.add') }}">Add Role </a>
                              </li>

                              <li>
                                  <i class="fa fa-bars"></i>
                                  <a href="{{ route('roles.all') }}">Roles</a>
                              </li>
                          </ul>
                      </li>
                  @endcan



                  {{-- <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                          <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                      </ul>
                  </li> --}}
                  {{-- <li class="menu-title">Extras</li><!-- /.menu-title -->
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                          <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                          <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a>
                          </li>
                      </ul>
                  </li> --}}
              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside>
  <!-- /#left-panel -->

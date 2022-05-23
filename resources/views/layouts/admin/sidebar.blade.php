  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">

                  <li class="active">
                      <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                  </li>

                  {{-- <li class="menu-title">J Managment</li><!-- /.menu-title --> --}}
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Rise Demand</a>
                      <ul class="sub-menu children dropdown-menu">
                          {{-- <li><i class="fa fa-bars"></i><a href="{{ route('admin.demand.new') }}"> New Demand</a>
                          </li> --}}
                          <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.all') }}">Demand List</a>
                          </li>
                      </ul>
                  </li>

                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Job Posting</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="fa fa-bars"></i><a href="{{ route('admin.demand.requested') }}"> New
                                  Job</a>
                          </li>
                      </ul>
                  </li>


                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Users Authorities </a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="fa fa-bars"></i><a href="{{ route('admin.users.add') }}"> Add User</a>
                          </li>
                          <li><i class="fa fa-bars"></i><a href="{{ route('admin.users.all') }}"> Users
                                  management</a>
                          </li>
                          {{-- <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.all') }}"> Downlaod List</a> --}}
                  </li>


              </ul>
              </li>
              <li class="menu-title"></li><!-- /.menu-title -->






              {{-- * Settings --}}
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="menu-icon fa fa-cog"></i> Settings</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li>
                          <i class="menu-icon fa fa-bars"></i>
                          <a href="{{ route('admin.sector.all') }}"> Category List</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-plus"></i>
                          <a href="{{ route('admin.sector.new') }}"> Add Category</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-bars"></i>
                          <a href="{{ route('admin.title.all') }}"> Titles List</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-plus"></i>
                          <a href="{{ route('admin.title.new') }}"> Add Title</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-bars"></i>
                          <a href="{{ route('admin.nationality.all') }}"> Nationality List</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-plus"></i>
                          <a href="{{ route('admin.nationality.new') }}"> Add Nationality</a>
                      </li>
                  </ul>
              </li>


              {{-- * Agent --}}
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="menu-icon fa fa-users"></i> Agent</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li>
                          <i class="menu-icon fa fa-plus"></i>
                          <a href="{{ route('agent.create') }}"> Add Agent</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-bars"></i>
                          <a href="{{ route('agent.list') }}"> Agent Managment</a>
                      </li>
                  </ul>
              </li>

              {{-- * Client --}}
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="menu-icon fa fa-users"></i> Client</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li>
                          <i class="menu-icon fa fa-plus"></i>
                          <a href="{{ route('client.create') }}"> Add client</a>
                      </li>
                      <li>
                          <i class="menu-icon fa fa-bars"></i>
                          <a href="{{ route('client.list') }}"> Client Mangament</a>
                      </li>
                  </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="menu-icon fa fa-phone"></i>Contact Queries</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-users"></i><a
                              href="{{ route('admin.contacts.employers') }}">Clients Queries</a></li>
                      <li><i class="menu-icon fa fa-users"></i><a
                              href="{{ route('admin.contacts.talents') }}">Agents Queries</a></li>
                      <li><i class="menu-icon fa fa-users"></i><a href="{{ route('admin.contacts.guests') }}">Guests
                              Queries</a></li>
                  </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Applications Mangament</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-file-text"></i><a
                            href="{{ route('admin.applications.all') }}">All Applications</a></li>
                    {{-- <li><i class="menu-icon fa fa-file-text"></i><a
                            href="{{ route('admin.applications.medical') }}">Waiting For Medical</a></li>
                    <li><i class="menu-icon fa fa-file-text"></i><a
                            href="{{ route('admin.applications.visa') }}">Waiting For Visa</a></li> --}}
                </ul>
            </li>

              {{-- <li class="menu-item-has-children dropdown">
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
                  </li> --}}
              {{-- <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Candidacy Orders</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-folder-o"></i><a
                                  href="{{ route('admin.candidacy.orders.all') }}">All Orders</a></li>
                      </ul>
                  </li> --}}



              @can('contact management')
                  {{-- <li class="menu-item-has-children dropdown">
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
                      </li> --}}
              @endcan

              @can('roles management')
                  {{-- <li class="menu-item-has-children dropdown">
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
                      </li> --}}
              @endcan





              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside>
  <!-- /#left-panel -->

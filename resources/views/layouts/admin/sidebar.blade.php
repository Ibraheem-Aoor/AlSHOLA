  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">

                  <li class="active">
                      <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                  </li>

                  {{-- <li class="menu-title">J Managment</li><!-- /.menu-title --> --}}
                  @can('Rise Demand')
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
                  @endcan

                  @can('Job Posting')
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Job Posting</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.demand.requested') }}"> New
                                      Job</a>
                              </li>
                          </ul>
                      </li>
                  @endcan



                  @can('Users Authorities')
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
                  @endcan


              </ul>
              </li>
              <li class="menu-title"></li><!-- /.menu-title -->


              {{-- Application Management --}}
              @can('Applications Mangement')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="menu-icon fa fa-file-pdf-o"></i>Applications Mangament</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-file-text"></i><a href="{{ route('admin.applications.all') }}">All
                                  Applications</a></li>
                      </ul>
                  </li>
              @endcan



              {{-- * Agent --}}
              @can('Agent')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
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
              @endcan


              {{-- * Client --}}
              @can('Client')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
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
              @endcan



              {{-- Contact management --}}
              @can('Contact Queries')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="menu-icon fa fa-phone"></i>Contact Queries</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-users"></i><a
                                  href="{{ route('admin.contacts.employers') }}">Clients Queries</a></li>
                          <li><i class="menu-icon fa fa-users"></i><a href="{{ route('admin.contacts.talents') }}">Agents
                                  Queries</a></li>
                          <li><i class="menu-icon fa fa-users"></i><a href="{{ route('admin.contacts.guests') }}">Guests
                                  Queries</a></li>
                      </ul>
                  </li>
              @endcan


              {{-- Invoices And Reciepts --}}
              @can('Invoices')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="menu-icon fa fa-money"></i>Invoices </a>
                  </li>
              @endcan


              @can('Roels & Permessions')
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

                          <li>
                              <i class="fa fa-bars"></i>
                              <a href="{{ route('role.new-admin') }}">New Admin</a>
                          </li>
                      </ul>
                  </li>
              @endcan



              {{-- History Recored --}}
              @can('History Recored')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="menu-icon fa fa-history"></i>History Recored</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-users"></i><a
                                  href="{{ route('admin.history.demand') }}">Deamnd Recored</a></li>
                          <li><i class="menu-icon fa fa-users"></i><a
                                  href="{{ route('admin.history.application') }}">Application Recored</a></li>
                          <li><i class="menu-icon fa fa-users"></i><a
                                  href="{{ route('admin.history.user') }}">User Managament Recored</a></li>
                          <li><i class="menu-icon fa fa-users"></i><a
                                  href="{{ route('admin.history.auth') }}">Authentication Recored</a></li>
                      </ul>
                  </li>
              @endcan



              {{-- * Settings --}}
              @can('Settings')
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="menu-icon fa fa-cog"></i> Settings</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li>
                              <i class="menu-icon fa fa-bars"></i>
                              <a href="{{ route('admin.sector.all') }}"> Category Management</a>
                          </li>
                          <li>
                              <i class="menu-icon fa fa-bars"></i>
                              <a href="{{ route('admin.title.all') }}"> Titles Management</a>
                          </li>
                          <li>
                              <i class="menu-icon fa fa-bars"></i>
                              <a href="{{ route('admin.nationality.all') }}"> Nationality List</a>
                          </li>
                          <li>
                              <i class="menu-icon fa fa-usd"></i>
                              <a href="{{ route('admin.currency.all') }}"> Currency Management</a>
                          </li>
                          <li>
                              <i class="menu-icon fa fa-cog"></i>
                              <a href="{{ route('admin.settings.general') }}"> General Settings</a>
                          </li>
                      </ul>
                  </li>
              @endcan


              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside>
  <!-- /#left-panel -->

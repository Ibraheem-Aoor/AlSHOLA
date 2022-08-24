  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">

                  <li class="active">
                      <a href="{{ route('broker.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                  </li>
                  <li class="active">
                      <a href="{{ route('broker.demands') }}"><i class="menu-icon fa fa-bullhorn"></i>Deamnds</a>
                  </li>
                  <li class="active">
                      <a href="{{ route('broker.demands.new')}}"><i class="menu-icon fa fa-bullhorn"></i>New Demand</a>
                  </li>

                  {{-- <li class="menu-title">J Managment</li><!-- /.menu-title --> --}}
                  {{-- @can('Rise Demand')
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Demand</a>
                          <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-bars"></i><a href="{{ route('admin.jobs.all') }}">Demand List</a>
                              </li>
                          </ul>
                      </li>
                  @endcan --}}



              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside>
  <!-- /#left-panel -->

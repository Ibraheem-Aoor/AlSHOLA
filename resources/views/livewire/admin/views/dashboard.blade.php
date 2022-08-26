<div>
    @section('title', 'ALSHOALA - Admin | DASHBOARD')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
        @php
            $data = Cache::get('adminData');
        @endphp
        <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-file"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $data['totalDemands'] }}</span>
                                        </div>
                                        <div class="stat-heading">Existing Client Demand</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-users"></i>

                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalCandidates'] }}</span></div>
                                        <div class="stat-heading">Existing Candidates</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-clock"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalApplicationsWFSelection'] }}</span>
                                        </div>
                                        <div class="stat-heading">Waiting for Offer</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <img src="{{asset('assets/dist_3/assets/images/patient.png')}}"
                                         class="img img-fluid" width="15%">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalApplicationsWFMedical'] }}</span></div>
                                        <div class="stat-heading">Waiting for Medical</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <img src="{{asset('assets/dist_3/assets/images/landing-icon-17.jpg')}}"
                                         class="img img-fluid" width="17%">

                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalApplicationsWFArrival'] }}</span></div>
                                        <div class="stat-heading">Waiting for Arrival</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-credit"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalApplicationsWFvisa'] }}</span></div>
                                        <div class="stat-heading">Waiting for Visa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <img src="{{asset('assets/dist_3/assets/images/job-interview-icon-8.jpg')}}"
                                         class="img img-fluid" width="15%">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span
                                                class="count">{{ $data['totalApplicationsWFInterview'] }}</span>
                                        </div>
                                        <div class="stat-heading">Waiting for Interview</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <img src="{{asset('assets/dist_3/assets/images/pause.png')}}"
                                         class="img img-fluid" width="15%">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $data['totalApplicationsHold'] }}</span>
                                        </div>
                                        <div class="stat-heading">Holding</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Traffic </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <canvas id="myChart" width="100" height="100"></canvas>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <canvas id="myChart_2" width="100" height="100"></canvas>
                                </div> <!-- /.card-body -->
                            </div>
                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div>
            <!--  /Traffic -->
            <div class="clearfix"></div>
            <!-- Latest jobs -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Latest Submited Demands</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Demand No</th>
                                            <th>Client Name</th>
                                            <th>Status</th>
                                            <th>created_at</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $latestJobs = Cache::get('adminData')['latestJobs'];
                                            $i = 1;
                                        @endphp
                                        @forelse($latestJobs as $job)
                                            <tr>
                                                <td class="serial">{{ $i++ }}</td>
                                                <td> <span class="name"><a
                                                            href="{{ route('admin.demand.details', $job->id) }}">{{ $job->post_number }}</a></span>
                                                </td>
                                                <td><span class="product">{{ $job->user->name }}</span></td>
                                                <td>{{ $job->subStatus->name }}</td>
                                                <td>
                                                    {{ $job->created_at->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                    {{-- Latest Applications --}}
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Latest Submited Applications</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">REF</th>
                                            <th>Agent Name</th>
                                            <th>Status</th>
                                            <th>created_at</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $latestApplications = Cache::get('adminData')['latestApplications'];
                                            $i = 1;
                                        @endphp
                                        @forelse($latestApplications as $application)
                                            <tr>
                                                <td class="serial">{{ $i++ }}</td>
                                                <td> <span class="name"><a
                                                            href="{{ route('admin.application.details', $application->id) }}">{{ $application->ref }}</a></span>
                                                </td>
                                                <td><span class="product">{{ $application->user->name }}</span>
                                                </td>
                                                <td>{{ $application->subStatus->name }}</td>
                                                <td>
                                                    {{ $application->created_at->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
            <!-- /.orders -->
        {{-- <!-- To Do and Live Chat -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title box-title">To Do List</h4>
                        <div class="card-content">
                            <div class="todo-list">
                                <div class="tdl-holder">
                                    <div class="tdl-content">
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="checkbox"><i
                                                        class="check-box"></i><span>Conveniently fabricate
                                                        interactive technology for ....</span>
                                                    <a href='#' class="fa fa-times"></a>
                                                    <a href='#' class="fa fa-pencil"></a>
                                                    <a href='#' class="fa fa-check"></a>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox"><i
                                                        class="check-box"></i><span>Creating component
                                                        page</span>
                                                    <a href='#' class="fa fa-times"></a>
                                                    <a href='#' class="fa fa-pencil"></a>
                                                    <a href='#' class="fa fa-check"></a>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" checked><i
                                                        class="check-box"></i><span>Follow back those who
                                                        follow you</span>
                                                    <a href='#' class="fa fa-times"></a>
                                                    <a href='#' class="fa fa-pencil"></a>
                                                    <a href='#' class="fa fa-check"></a>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" checked><i
                                                        class="check-box"></i><span>Design One page
                                                        theme</span>
                                                    <a href='#' class="fa fa-times"></a>
                                                    <a href='#' class="fa fa-pencil"></a>
                                                    <a href='#' class="fa fa-check"></a>
                                                </label>
                                            </li>

                                            <li>
                                                <label>
                                                    <input type="checkbox" checked><i
                                                        class="check-box"></i><span>Creating component
                                                        page</span>
                                                    <a href='#' class="fa fa-times"></a>
                                                    <a href='#' class="fa fa-pencil"></a>
                                                    <a href='#' class="fa fa-check"></a>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!-- /.todo-list -->
                        </div>
                    </div> <!-- /.card-body -->
                </div><!-- /.card -->
            </div>

        </div>
        <!-- /To Do and Live Chat --> --}}

        <!-- Calender Chart Weather  -->
            <div class="row">
                <div class="col-lg-4 col-md-6" style="visibility: hidden">
                    <div class="card ov-h">
                        <div class="card-body bg-flat-color-2">
                            <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                        </div>
                        <div id="cellPaiChart" class="float-chart"></div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /Calender Chart Weather -->
        </div>
        <!-- .animated -->
    </div>
</div>
@php
    $jobsCount = Cache::get('adminData')['jobsCount'];
    $applicationsCount = Cache::get('adminData')['applicationsCount'];
@endphp
@push('js')
    <script>
        const ctx_2 = document.getElementById('myChart_2').getContext('2d');
        const myChart_2 = new Chart(ctx_2, {
            type: 'pie',
            data: {
                labels: ['Total Demands', 'Total Applications'],
                datasets: [{
                    label: 'Avilable Jobs',
                    data: [{{ $jobsCount }}, {{ $applicationsCount }}],
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                    ],
                }]
            },
        });
    </script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Demands',
                    data: [{{ $jobArr[1] }}, {{ $jobArr[2] }}, {{ $jobArr[3] }},
                        {{ $jobArr[4] }}, {{ $jobArr[5] }}, {{ $jobArr[6] }},
                        {{ $jobArr[7] }},
                        {{ $jobArr[8] }}, {{ $jobArr[9] }}, {{ $jobArr[10] }},
                        {{ $jobArr[11] }}, {{ $jobArr[12] }},
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    width: 20,
                    height: 20,
                }
            }
        });
    </script>
@endpush

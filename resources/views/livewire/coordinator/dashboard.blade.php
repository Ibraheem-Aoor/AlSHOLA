<div>
    @push('css')
        <style>
            table {
                font-size: 0.8rem;
            }

            .titles tr:nth-child(even) {
                background-color: #00B074;
                color: #ffff;
            }

            .titles th {
                background-color: #d8e8a7;
            }

            .basicInfo tr td:nth-child(even) {
                background-color: #00B074;
                color: #ffff;

            }
        </style>
    @endpush
    <div class="content">
        <div class="animated fadeIn">




            {{-- End Statistics --}}



            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Total Statistics</strong><small></small>
                        </div>
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <canvas id="myChart" width="100" height="100"></canvas>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <canvas id="myChart_2" width="100" height="100"></canvas>
                                    </div> <!-- /.card-body -->
                                </div>
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td>Commission Rate:</td>
                                            <td>{{ $broker->commission_rate }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Total Demands:</td>
                                            <td>{{ $broker->brokerJobs()->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Demands Income:</td>
                                            <td>{{ $totalIncome }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Commission Amount:</td>
                                            <td>{{ $totalIncome * ($broker->commission_rate / 100) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>This Month Statistics</strong><small></small>
                        </div>
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <canvas id="myChart_3" width="100" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td>Commission Rate:</td>
                                            <td>{{ $broker->commission_rate }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Total Demands:</td>
                                            <td>{{ $thisMonthAchivedSales }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Demands Income:</td>
                                            <td>{{ $thisMonthTotalIncome }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Commission Amount:</td>
                                            <td>{{ $thisMonthTotalIncome * ($broker->commission_rate / 100) }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- End This month Statistics --}}




            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Latest Demands</strong><small></small>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12 text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Demand No.</th>
                                                <th scope="col">Client</th>
                                                <th scope="col">status</th>
                                                <th scope="col">creation_date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                $jobs = $broker
                                                    ->brokerJobs()
                                                    ->with(['user', 'subStatus'])
                                                    ->paginate(10);
                                            @endphp
                                            @forelse ($jobs->take(10) as $job)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $job->post_number }}</td>
                                                    <td>{{ $job->user->name }}</td>
                                                    <td>{{ $job->subStatus->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->format('Y-M-d') }}</td>
                                                    <td>
                                                        <a href="{{ route('broker.demand.details', $job->id) }}"
                                                            class="btn-sm btn-outline-primary"><i
                                                                class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="alert alert-warning text-center bg-dark"
                                                        style="color:#fff">
                                                        No Records Yet
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {!! $jobs->fragment('custom-nav-attachments')->links() !!}
                                </div>
                            </div>
                            </p>

                            {{-- End Demands --}}

                        </div>
                    </div>
                </div>
            </div>












        </div>
    </div>
</div>







</div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script>
        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var message = button.data('message')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #message').val(message);
        });
        $('#descmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var message = button.data('message')
            // var messageription = button.data('messageription')
            var modal = $(this)
            modal.find('.modal-body #message').val(message);
        });
        $('#exampleModal_6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // var idription = button.data('idription')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        });
    </script>

    <script>
        $('#exampleModal_115').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var job = button.data('job')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #job').val(job);
        });
    </script>

    <script>
        const ctx_2 = document.getElementById('myChart_2').getContext('2d');
        const myChart_2 = new Chart(ctx_2, {
            type: 'pie',
            data: {
                labels: ['Total Required Sales', 'Total Achieved'],
                datasets: [{
                    label: 'Sales',
                    data: [{{ $broker->total_required_sales ?? 0 }}, {{ $broker->total_achived ?? 0 }}],
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                    ],
                }]
            },
        });
    </script>

    <script>
        const ctx_3 = document.getElementById('myChart_3').getContext('2d');
        const myChart_3 = new Chart(ctx_3, {
            type: 'pie',
            data: {
                labels: ['Total Required Sales', 'Total Achieved'],
                datasets: [{
                    label: 'Sales',
                    data: [{{ $thisMonthGoal ?? 0 }}, {{ $thisMonthAchivedSales ?? 0 }}],
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
                    label: 'Total Broker Demands',
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
</div>

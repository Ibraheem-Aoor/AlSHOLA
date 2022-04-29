<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Choose The Suitable Talent To Apply for this job</h4>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-check"></i> Success!</strong>
                                    {{ Session::get('success') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"><i class="fa fa-close"></i></button>
                                </div>
                            @elseif(Session::has('warning'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-warning"></i> Warning!</strong>
                                    {{ Session::get('warning') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"><i class="fa fa-close"></i></button>
                                </div>
                            @endif

                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Name</th>
                                                <th>join_date</th>
                                                <th>ِActions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($employees as $employee)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $employee->name }}
                                                    </td>
                                                    <td>{{ $employee->created_at }}</td>
                                                    @if ($employee->hasJob($job))
                                                        <td>
                                                            <a href="#"
                                                                wire:click="takeJobFromTalent('{{ $employee->id }}')"
                                                                class="btn btn-outline-danger">Cancel</a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <a href="#"
                                                                wire:click="snedJobToEmployer('{{ $employee->id }}')"
                                                                class="btn btn-primary">Send Job</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center alert alert-warning">No Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

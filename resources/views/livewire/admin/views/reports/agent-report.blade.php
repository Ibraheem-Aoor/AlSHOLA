<div>
    @section('title', 'ALSHOALA - Admin | AGENTS LIST')
    @push('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endpush
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Agent Report</h4>
                            </div>
                            <div class="card-body--">
                                <div class="container mb-2">
                                    <div class="row">
                                        <div class="col-sm-6" wire:ignore>
                                            <select id="select-state" multiple placeholder="select agents .."
                                                autocomplete="off" wire:model.lazy="selectedAgents">
                                                @forelse($agents as $agnet)
                                                    <option value="{{ $agnet->id }}">{{ $agnet->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-stats order-table ov-h">
                                    <table class="table" id="myTable">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse($agents as $agent)
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Agent Name</th>
                                                    <th>Registration No</th>
                                                    <th>Country</th>
                                                    <th>Responsible Person</th>
                                                    <th>Mobile No.</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="serial">{{ ++$i }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.user.profile.show', $agent->id) }}">
                                                            {{ $agent->name }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $agent->registration_No }}
                                                    </td>
                                                    <td>
                                                        {{ $agent->country->name }}
                                                    </td>
                                                    <td>{{ $agent->responsible_person }}</td>
                                                    <td>{{ $agent->mobile }}</td>
                                                </tr>
                                                @if ($agent->applications_count > 0)
                                                    <tr style="background-color:lightgray">
                                                        <td>&nbsp;</td>
                                                        <td>Client</td>
                                                        <td>Title</td>
                                                        <td>Demand</td>
                                                        <td>Supply</td>
                                                        <td>Balance</td>
                                                    </tr>
                                                    @php
                                                        $j = 0;
                                                    @endphp
                                                    @forelse($agent->applications as $application)
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>{{ $application->job->user->name }}</td>
                                                        <td>{{ $application->title->name }}</td>
                                                        <td>{{ $titleQty = $application->job->subJobs()->where('title_id', $application->title_id)->sum('quantity') }}
                                                        </td>
                                                        <td>{{ $agent->applications->where('title_id', 1)->count() }}
                                                        </td>
                                                        <td>{{ $titleQty - $agent->applications_count }}
                                                        </td>
                                                    </tr>

                                                    @empty
                                                    @endforelse
                                                    <tr>
                                                    </tr>
                                                @endif

                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center alert alert-warning">No
                                                        Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    {{ $agents->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <script>
            new TomSelect("#select-state", {
                maxItems: 200
            });
        </script>
    @endpush
</div>

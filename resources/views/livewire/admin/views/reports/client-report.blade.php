<div>
    @section('title', 'ALSHOALA - Admin | AGENTS LIST')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Registerd Agnet</h4>
                            </div>
                            <div class="card-body--">
                                <div class="container mb-2">
                                    <div class="row">
                                        <div class="col-sm-6" wire:ignore>
                                            <select id="select-state" multiple placeholder="select clients .."
                                                autocomplete="off" wire:model.lazy="selectedClients">
                                                @forelse($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        @php
                                            $j = 0;
                                        @endphp
                                        @forelse($clients as $client)
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Client Name</th>
                                                    <th>Registration No</th>
                                                    <th>Country</th>
                                                    <th>Responsible Person</th>
                                                    <th>Mobile No.</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="serial">{{ ++$j }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.user.profile.show', $client->id) }}">
                                                            {{ $client->name }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $client->registration_No }}
                                                    </td>
                                                    <td>
                                                        {{ $client->country->name }}
                                                    </td>
                                                    <td>{{ $client->responsible_person }}</td>
                                                    <td>{{ $client->mobile }}</td>
                                                </tr>
                                                @if (count($client->clientJobs) > 0)
                                                    <tr style="background-color:lightgray">
                                                        <td>&nbsp;</td>
                                                        <td>Agent</td>
                                                        <td>Title</td>
                                                        <td>Demand</td>
                                                        <td>Supply</td>
                                                        <td>Balance</td>
                                                    </tr>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @forelse($client->clientJobs as $job)
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @forelse($job->applications as $application)
                                                            <td>&nbsp;</td>
                                                            <td>{{ $application->user->name }}</td>
                                                            <td>{{ $job->subJobs[$i++]?->title->name }}</td>
                                                            <td>{{ $titleQty = $job->subJobs()->where('title_id', $application->title_id)->sum('quantity') }}
                                                            </td>
                                                            <td>{{ $appliedApplications = $job->applications->where('title_id', 1)->count() }}
                                                            </td>
                                                            <td>{{ $titleQty - $appliedApplications }}
                                                            </td>
                                                        @empty
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>{{ $job->subJobs[$i++]?->title->name }}</td>
                                                                <td>{{ $titleQty = $job->subJobs()->where('title_id', $application->title_id)->sum('quantity') }}
                                                                </td>
                                                                <td>0</td>
                                                                <td>{{ $titleQty }}</td>
                                                        @endforelse
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
                                    {{ $clients->links() }}
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
        <script>
            new TomSelect("#select-state", {
                maxItems: 200
            });
        </script>
    @endpush
</div>

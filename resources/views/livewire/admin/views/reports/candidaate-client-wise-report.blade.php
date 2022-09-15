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
                                            <select id="select-state" multiple placeholder="select client .."
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
                                            $i = 0;
                                        @endphp
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Application No</th>
                                                <th>Passport No</th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Agent</th>
                                                <th>Client</th>
                                                <th>Coordinator</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($applications as $application)
                                                <tr>
                                                    <td class="serial">{{ ++$i }}</td>
                                                    <td>
                                                        {{ $application->ref }}
                                                    </td>
                                                    <td>
                                                        {{ $application->passport_no }}
                                                    </td>
                                                    <td>
                                                        {{ $application->full_name }}
                                                    </td>
                                                    <td>{{ $application->title->name }}</td>
                                                    <td>{{ $application->user->name }}</td>
                                                    <td>{{ $application?->job?->user?->name }}</td>
                                                    <td>&nbsp;</td>
                                                    <td>{{ $application->subStatus->name }}</td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center alert alert-warning">No
                                                        Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $applications->links() }}
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

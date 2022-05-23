<div>
    @section('title', 'AlSHLOA - Admin | AGENTS LIST')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Registerd Agents</h4>
                            </div>
                            <div class="card-body--">
                                <div class="container mb-2">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="search by name..."
                                                wire:model="nameFilter">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th> Agent Name</th>
                                                <th>Registration No</th>
                                                <th>Country</th>
                                                <th>Responsible Person</th>
                                                <th>Mobile No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($users as $user)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.user.profile.show', $user->id) }}">
                                                            {{ $user->name }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $user->registration_No }}
                                                    </td>
                                                    <td>
                                                        {{ $user->country->name }}
                                                    </td>
                                                    <td>{{ $user->responsible_person }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    @if ($user->hasJob($job))
                                                        @if ($user->hasAppliedToJob($job->id))
                                                            <td>
                                                                <span class="badge badge-complete">Applied</span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="#"
                                                                    wire:click="takeJobFromAgent('{{ $user->id }}')"
                                                                    class="btn btn-outline-danger">Cancel</a>
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            <a href="#"
                                                                wire:click="sendJobToAgent('{{ $user->id }}')"
                                                                class="btn btn-primary">SEND</a>
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
                                    {{ $users->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

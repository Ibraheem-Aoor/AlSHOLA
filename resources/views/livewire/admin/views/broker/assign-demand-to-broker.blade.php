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
                                                <th>Broker Name</th>
                                                <th>E-mail</th>
                                                <th>Registration No</th>
                                                <th>Responsible Person</th>
                                                <th>Mobile No.</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($brokers as $broker)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td class="">
                                                        {{ $broker->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{$broker->email}}
                                                    </td>
                                                    <td class="">
                                                        {{ $broker->registration_No }}
                                                    </td>
                                                    <td class="">{{ $broker->responsible_person}}</td>
                                                    <td class="">{{ $broker->mobile }}</td>
                                                    <td>
                                                        @if ($job->broker_id == $broker->id)
                                                            <button class="btn btn-outline-danger"
                                                                wire:click="removeBroker({{ $broker->id }})">CANCEL</button>
                                                        @else
                                                            <button class="btn btn-outline-info"
                                                                wire:click="selectBroker({{ $broker->id }})">SELECT</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="" colspan="7"
                                                        class="text-center alert alert-warning">No Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $brokers->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->



                </div>
            </div>
        </div>
    </div>
</div>

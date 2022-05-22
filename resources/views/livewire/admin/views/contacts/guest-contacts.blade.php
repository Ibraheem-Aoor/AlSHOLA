<div>
    @section('title' , 'AlSHLOA - Admin | Guests Contacts')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Guests Queries</h4>
                                <h2><span class="text-danger">Note:</span> These recoreds aren't belongs to registered
                                    users.</h2>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>subject</th>
                                                <th>guest_name</th>
                                                <th>guest_email</th>
                                                <th>message</th>
                                                <th>Send_date</th>
                                                <th>ِActions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($contacts as $contact)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $contact->subject }}
                                                    </td>
                                                    <td><span>{{ $contact->name }}</span>
                                                    <td><span>{{ $contact->email }}</span>
                                                    <td>{{ Str::limit($contact->message, 40, '...') }}
                                                    </td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    {{-- <td>
                                                        <a href="#" class="btn btn-outline-warning" wire:click="$emitTo('GeneralModal' , 'testEvent')"><i class="fa fa-trash"></i> DELETE</a>
                                                    </td> --}}
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
                                    {{ $contacts->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

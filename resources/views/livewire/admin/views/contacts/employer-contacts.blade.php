<div>
    @section('title' , 'AlSHLOA - Admin | Employers Contacts')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Client Queries</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>subject</th>
                                                <th>user_name</th>
                                                <th>user_email</th>
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
                                                    <td><span>{{ $contact->user->name }}</span>
                                                    <td><span>{{ $contact->user->email }}</span>
                                                    <td>{{ Str::limit($contact->message , 40 , '...')}}
                                                    </td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    {{-- <td>
                                                        <a href="#" class="btn btn-outline-warning" wire:click="emitTo('GeneralModal' , 'testEvent')"><i class="fa fa-trash"></i> DELETE</a>
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

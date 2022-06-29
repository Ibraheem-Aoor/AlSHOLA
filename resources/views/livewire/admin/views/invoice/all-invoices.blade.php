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
                                <h4 class="box-title">All Issued Invoices</h4>
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
                                                <th>Invoice No.</th>
                                                <th>Issued To</th>
                                                <th>Total Qty</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($invoices as $invoice)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td class="">
                                                        <a href="#">
                                                            {{ $invoice->number }}
                                                        </a>
                                                    </td>
                                                    <td class="">
                                                        {{ $invoice->user->name }}
                                                    </td>
                                                    <td class="">
                                                        {{ $invoice->qty() }}
                                                    </td>
                                                    <td class="">
                                                        {{ $invoice->totalCharge()}}
                                                    </td>
                                                    <td>
                                                            <a href="{{route('admin.invoice.print' , $invoice->id)}}"><i class="fa fa-print"></i></a>
                                                            <a href="#"><i class="fa fa-trash" wire:click="deleteInvoice({{$invoice->id}})"></i></a>
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
                                    {{ $invoices->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->



                </div>
            </div>
        </div>
    </div>
</div>

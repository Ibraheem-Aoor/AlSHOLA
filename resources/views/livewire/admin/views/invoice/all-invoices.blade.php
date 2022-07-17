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
                                                <th>Demand No.</th>
                                                <th>Invoice No.</th>
                                                <th>Issued To</th>
                                                <th>Total Qty</th>
                                                <th>Total Amount</th>
                                                <th>Total Paid</th>
                                                <th>Total Left</th>
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
                                                        <a
                                                            href="{{ route('admin.demand.details', $invoice->job->id) }}">
                                                            {{ $invoice->job->post_number }}
                                                        </a>
                                                    </td>
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
                                                        {{ $invoice->totalCharge() * $invoice->qty() }}
                                                    </td>

                                                    <td>
                                                        {{ $invoice->paid_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $invoice->totalCharge() * $invoice->qty() - $invoice->paid_amount }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.invoice.print', $invoice->id) }}"><i
                                                                class="fa fa-print"></i></a>
                                                        <a href="#"><i class="fa fa-edit" data-toggle="modal"
                                                                data-id="{{ $invoice->id }}"
                                                                href="#exampleModal_8"></i></a>
                                                        <a href="#"><i class="fa fa-trash"
                                                                wire:click="deleteInvoice({{ $invoice->id }})"></i></a>
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



                    <!-- Change status modal Modal -->
                    <div class="modal fade" id="exampleModal_8" tabindex="-1" wire:ignore
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ٍjob Status:</h5>
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('admin.invoice.update') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" id="id" name="id">
                                            <select id="" class="form-control" name="status" required>
                                                <option value="" selected>--select status--</option>
                                                <option value="Totaly Paid">Totaly Paid</option>
                                                <option value="Unpaid">Unpaid</option>
                                                <option value="Partly Paid">Partly Paid</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="paid_amount"
                                                placeholder="Paid Amount">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
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
            var desc = button.data('desc')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #desc').val(desc);
        });
    </script>

    <script>
        $('#exampleModal_8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('input[name="paid_amount"]').hide();
            $('select[name="status"]').on('change', function() {
                status = $(this).val();
                if (status == 'Partly Paid') {
                    $('input[name="paid_amount"]').show();
                } else {
                    $('input[name="paid_amount"]').hide();
                }

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            var url = document.location.toString();
            if (url.match('#')) {
                $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
            }

            //To make sure that the page always goes to the top
            setTimeout(function() {
                window.scrollTo(0, 0);
            }, 200);

        });
    </script>
@endpush

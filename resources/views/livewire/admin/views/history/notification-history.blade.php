<div>
    @section('title', 'ALSHOALA - Admin | DEMAND HISTORY')
    @push('css')
        <style>
            .table-stats table th,
            .table-stats table td {
                border: none;
                border-bottom: 1px solid #e8e9ef;
                color: #868e96;
                font-size: 12px;
                font-weight: normal;
                padding: .75em 1.25em;
                text-transform: none;
            }
        </style>
    @endpush
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Demand Hisotry</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Domain</th>
                                                <th>Message</th>
                                                <th>date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($notifications as $notification)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ substr($notification->type, 10) }}
                                                    </td>
                                                    <td>
                                                        {{ json_decode($notification->data , true) }}
                                                    </td>
                                                    <td>
                                                        {{ $notification->created_at }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center alert alert-warning">No
                                                        Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $notifications->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

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
                var job = button.data('job')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #job').val(job);
            });
        </script>
    @endpush
</div>

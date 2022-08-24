@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush
<div class="container">
    <div class="col-sm-12"></div>
    <div class="row  mt-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>All Demands</strong><small></small>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 text-center">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Demand No.</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">status</th>
                                        <th scope="col">creation_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $jobs = $broker
                                            ->brokerJobs()
                                            ->with(['user', 'subStatus'])
                                            ->paginate(10);
                                    @endphp
                                    @forelse ($jobs->take(10) as $job)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $job->post_number }}</td>
                                            <td>{{ $job->user->name }}</td>
                                            <td>{{ $job->subStatus->name }}</td>
                                            <td>{{ $job->created_at }}</td>
                                            {{-- <td>
                                                <a href="{{ route('admin.demand.details', $job->id) }}"
                                                    class="btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="alert alert-warning text-center bg-dark"
                                                style="color:#fff">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $jobs->links() !!}
                        </div>
                    </div>
                    </p>

                    {{-- End Demands --}}

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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $('#exampleModal_6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        $('#flight_ticket').hide();

        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var type = button.data('type')
            var title = button.data('title')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #type').val(type);
            document.getElementById('title').innerHTML = title;
            $('select[name="file_type"]').on('change', function() {
                if ($(this).val() == 'Flight Ticket') {
                    $('#flight_ticket').show();
                } else {
                    $('#flight_ticket').hide();
                    $('#flight_ticket').removeAttribute('name');
                }

            });

        });
    </script>
@endpush

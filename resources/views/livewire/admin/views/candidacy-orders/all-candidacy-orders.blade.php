<div>
    <div class="content">


        <!-- Modal -->
        <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" id="message" cols="30" rows="10" readonly></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert"></div>
                                @endif
                                <h4 class="box-title">
                                    {{-- <span class="text-danger">Job_Title:</span>
                                    {{ $jobTitle }} <br>
                                    <span class="text-danger">Job_number:</span>
                                    {{ $jobNumber }} --}}
                                </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Recommended_BY</th>
                                                <th>Email</th>
                                                <th>Job_Number</th>
                                                <th>Job_Title</th>
                                                <th>Recommendations</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($orders as $order)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $order->user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $order->user->email }}
                                                    </td>
                                                    <td>
                                                        {{ $order->job->number }}
                                                    </td>
                                                    <td>
                                                        {{ $order->job->title }}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.candidacy.orders.recommendations.all' , $order->id)}}">
                                                            {{ $order->recommendations_count }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $order->created_at }}
                                                    </td>
                                                </tr>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center alert alert-warning">No Records
                                    Yet!
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->




        </div>



    </div>
</div>
</div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script>
        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var message = button.data('message')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #message').val(message);
        })
    </script>
@endpush
</div>

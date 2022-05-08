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
                                    <span class="text-danger">Order_Number:</span>
                                    {{ $order->number }} <br>
                                    <span class="text-danger">Job_Title:</span>
                                    {{ $order->job->title }} <br>
                                    <span class="text-danger">Job_number:</span>
                                    {{ $order->job->post_number }}
                                </h4>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-check"></i> Success!</strong>
                                    {{ Session::get('success') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"><i class="fa fa-close"></i></button>
                                </div>
                            @elseif(Session::has('warning'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-warning"></i> Warning!</strong>
                                    {{ Session::get('warning') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"><i class="fa fa-close"></i></button>
                                </div>
                            @endif
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Recommended_User_Name</th>
                                                <th>Recommended_User_Email</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($recommendations as $recommended)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $recommended->recommendedUser->name }}
                                                    </td>
                                                    <td>
                                                        {{ $recommended->recommendedUser->email }}
                                                    </td>
                                                    <td>
                                                        {{ $recommended->created_at }}
                                                    </td>
                                                    @if ($recommended->recommendedUser->hasJob($order->job))
                                                        @if ($recommended->recommendedUser->hasAppliedToJob($job->id))
                                                            <td>
                                                                <span class="badge badge-complete">Applied</span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="#"
                                                                    wire:click="takeJobFromTalent('{{ $recommended->recommendedUser->id }}')"
                                                                    class="btn btn-outline-danger">Cancel</a>
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            <a href="#"
                                                                wire:click="snedJobToEmployer('{{ $recommended->recommendedUser->id }}')"
                                                                class="btn btn-primary">Send Job</a>
                                                        </td>
                                                    @endif
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
                            {{ $recommendations->links() }}
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

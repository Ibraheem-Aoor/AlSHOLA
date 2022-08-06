<div>
    @section('title', 'ALSHOALA| All Brokers')
    @push('css')
        <style>
            table tr td,
            th {
                font-size: 12px !important;
                text-transform: none !important;
                text-decoration: none !important;
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
                                @if (Session::has('success'))
                                    <div class="alert"></div>
                                @endif
                                <h4 class="box-title">All Brokers</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Name</th>
                                                <th>Total Target</th>
                                                <th>Total Achived</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($brokers as $broker)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>{{ $broker->name }}</td>
                                                    <td>{{ $broker->total_required_sales }}</td>
                                                    <td>{{ $broker->total_achived }}</td>

                                                    <td colspan="2">
                                                        <a class="btn btn-outline-success" href="{{route('brokers.details' , $broker->id)}}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-outline-danger" data-toggle="modal" data-id="{{$broker->id}}" href="#exampleModal_6"><i class="fa fa-trash"></i></a>
                                                    </td>





                                                </tr>

                                </div>
                            </div>

                            {{-- <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton1">
                                                                <li>

                                                                </li>
                                                                <li>

                                                                </li>
                                                        </div> --}}

                            @empty
                                <tr>
                                    <td colspan="11" class="text-center alert alert-warning">No Records
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



                <!-- Modal -->
                <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Attachment:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="" style="font-weight: 600" id="title">UPLOAD</label>

                                <form action="{{ route('application.file.upload') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-sm-6 mb-3">
                                        <select name="file_type" class="form-control" id="">
                                            <option value="Medical">Medical</option>
                                            <option value="Agreement">Agreement</option>
                                            <option value="Flight Ticket">Flight Ticket</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" id="flight_ticket" name="flight_ticket"
                                            class="form-control mt-3">
                                        &nbsp; &nbsp; <input type="file" name="files[]" required multiple>
                                        <input type="text" id="id" name="id" hidden>
                                    </div>
                                    <div class="form-group col-sm-6 text-center" style="width: 100%">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-upload"></i>
                                            UPLOAD</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
    </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal_6" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('brokers.delete') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        Are you Sure about Delete Action?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </div>
                </form>
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
            $('#exampleModal_6').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
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
    </div>
    </div>



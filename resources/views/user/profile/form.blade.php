@switch(Auth::user()->type)
    @case('Talented')
        @php
        $user = 'employee';
        @endphp
    @break

    @case('Employer')
        @php
        $user = 'employer';
        @endphp
    @endswitch
    @extends('layouts.user.'.$user.'.master')
    @section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Demand')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications For Your Demands</h1>
            <div class="row g-4">
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="passaword" readonly
                                    value="{{ Auth::user()->name }}">
                                <label for="email"><i class="fa fa-user"></i> Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="passaword" readonly
                                    value="{{ Auth::user()->email }}">
                                <label for="email"><i class="fa fa-envelope"></i> E-mail</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating">
                                <textarea type="text" class="form-control" id="brief" placeholder="brief" @error('brief') is-invalid @enderror
                                    name="brief" required autocomplete="brief" autofocus>{{ old('brief') }}</textarea>
                                <label for="brief"><i class="fa fa-scroll"></i> brief about you</label>
                                @error('brief')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="file" class="form-control" id="brief" @error('cv') is-invalid @enderror
                                    name="cv" value="{{ old('cv') }}">
                                <label for="cv"><i class="fa fa-file"></i> CV/PROFILE</label>
                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- <!-- Modal -->
                <div class="modal fade" id="exampleModal_6" tabindex="-1" wire:ignore
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('employer.application.accept') }}" method="POST">
                                    @csrf
                                    <div class="form-group col-sm-6 mb-3">
                                        <label yle="font-weight: 600">JobL Title: </label>
                                        &nbsp; &nbsp; <input type="text" class="form-control" id="title" readonly>
                                        <input type="text" id="id" name="application_id" hidden>
                                    </div>
                                    <div class="form-group col-sm-6 mb-3">
                                        <label for="" style="font-weight: 600">Job Number: </label>
                                        &nbsp; &nbsp; <input type="text" class="form-control" id="number" readonly>
                                    </div>
                                    <div class="form-group col-sm-6 text-center" style="width: 100%">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-submit"></i>
                                            ACCEPT</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> --}}


        </div>
    </div>
    {{-- @push('js')
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

            <script>
                $('#exampleModal_6').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var title = button.data('title')
                    var number = button.data('number')
                    // var description = button.data('description')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #title').val(title);
                    modal.find('.modal-body #number').val(number);
                });
                $('#exampleModal_5').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                })
            </script>


            <script>
                const ctx = document.getElementById('myChart');
                const myChart = new Chart(ctx, {
                    type: 'doughnut',
                    const data = {
                            labels: [
                                'Red',
                                'Blue',
                                'Yellow'
                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [300, 50, 100],
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                });
            </script>
        @endpush --}}


</div>
</div>
@endsection

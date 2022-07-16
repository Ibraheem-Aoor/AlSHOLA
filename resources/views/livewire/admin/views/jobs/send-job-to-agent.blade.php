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
                                <h4 class="box-title">All Registerd Agents</h4>
                                <h5 class="text-primary">
                                    DSR: {{ $job->post_number }}
                                </h5>
                                {{-- <h5 class="text-primary">
                                    Category: {{ $job->subJobs->first()->title->sector->name }}
                                </h5>
                                <h5 class="text-primary">
                                    Title: {{ $job->subJobs->first()->title->name }}
                                </h5>
                                <h5 class="text-primary">
                                    Client: {{ $job->user->name }}
                                </h5> --}}
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
                                                <th> Agent Name</th>
                                                <th>Registration No</th>
                                                <th>Country</th>
                                                <th>Responsible Person</th>
                                                <th>Mobile No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($users as $user)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td class="">
                                                        <a href="{{ route('admin.user.profile.show', $user->id) }}">
                                                            {{ $user->name }}
                                                        </a>
                                                    </td>
                                                    <td class="">
                                                        {{ $user->registration_No }}
                                                    </td>
                                                    <td class="">
                                                        {{ $user->country->name }}
                                                    </td>
                                                    <td class="">{{ $user->responsible_person }}</td>
                                                    <td class="">{{ $user->mobile }}</td>
                                                    @if ($user->hasJob($job))
                                                        @if ($user->hasAppliedToJob($job->id))
                                                            <td class="">
                                                                <span class="badge badge-complete">Applied</span>
                                                                <a data-toggle="modal" data-agent="{{ $user->id }}"
                                                                    href="#exampleModal_5">
                                                                    <span class="btn badge badge-success">RESEND</span>
                                                                </a>
                                                            </td>
                                                        @else
                                                            <td class="">
                                                                <a href="#"
                                                                    wire:click="takeJobFromAgent('{{ $user->id }}')"
                                                                    class="btn btn-outline-danger">Cancel</a>
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td class="">
                                                            <a data-toggle="modal" data-agent="{{ $user->id }}"
                                                                href="#exampleModal_5" class="btn btn-primary">SEND</a>
                                                        </td>
                                                    @endif
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
                                    {{ $users->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->


                    <!--SHOW NOTE  Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal_5"
                        style="height: 600px;" aria-labelledby="myLargeModalLabel" aria-hidden="true" wire:ignore>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Set Up Demand Terms:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.demand.set-terms', $job->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body ">
                                        <input type="text" id="agent" name="agent" hidden>
                                        {{-- titles --}}
                                        <div class="col-sm-12 mt-2">
                                            <table class="table table-responsive" id="dynamicAddRemove">
                                                <tr>
                                                    <th colspan="2">Title</th>
                                                    <th>Service charge</th>
                                                    <th>Per</th>
                                                    <th>
                                                        <select name="currency" id="cs"
                                                            class="form-control text-center" style="width:50%;"
                                                            required>
                                                            <option value=""> -- choose currency -- </option>
                                                            @foreach ($currencies as $currency)
                                                                <option value="{{ $currency->key }}">
                                                                    {{ $currency->key }}</option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <select id="allTiltes" name="demandTerms[0][title]"
                                                            class="form-control" required>
                                                            <option value="" selected>
                                                                -- select one --
                                                            </option>
                                                            @foreach ($job->subJobs as $subJob)
                                                                <option value="{{ $subJob->title->name }}">
                                                                    {{ $subJob->title->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" required
                                                            name="demandTerms[0][service_charge]" placeholder="charge"
                                                            class="form-control" required />
                                                    </td>
                                                    <td><input type="text" required name="demandTerms[0][per]"
                                                            placeholder="per" class="form-control" />
                                                    </td>
                                                    <td><button type="button" name="add" id="dynamic-edu-ar"
                                                            class="btn btn-outline-primary btn-sm">Add</button></td>
                                                </tr>
                                            </table>
                                            @error('dynamicAddRemove')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Accept/Reject Duration:</label>
                                                <input type="text" class="form-control" required
                                                    name="acceptence_duration">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">CV Submission Duration:</label>
                                                <input type="text" class="form-control" required
                                                    name="submission_duration">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Completion Duration:</label>
                                                <input type="text" class="form-control" required
                                                    name="completion_duration">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Pay From:</label>
                                                <select name="pay_from" class="form-control" required>
                                                    <option selected>-- select one --</option>
                                                    <option value="Alshoala">ALSHOALA</option>
                                                    <option value="Agent">AGENT</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Pay To:</label>
                                                <input type="text" class="form-control" required name="pay_to"
                                                    readonly>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="">Payment Will Be:</label>
                                                <select name="after_before" class="form-control" required>
                                                    <option value="" selected>-- select one --</option>
                                                    <option value="before">Before</option>
                                                    <option value="after">After</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">SEND
                                            DEMAND</button>
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
                            $('#exampleModal_5').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var agent = button.data('agent')
                                // var description = button.data('description')
                                var modal = $(this)
                                modal.find('.modal-body #agent').val(agent);
                            });
                        </script>

                        <script>
                            var i = 0;
                            $("#dynamic-edu-ar").click(function() {
                                var el = document.getElementsByTagName('select')[1];
                                let newTitles = el;
                                ++i;
                                newTitles.setAttribute('name', 'demandTerms[' + i + '][title]')
                                $("#dynamicAddRemove").append(
                                    '<tr><td colspan="2">' + newTitles.outerHTML +
                                    '</td><td><input type="numeric" name="demandTerms[' +
                                    i +
                                    '][service_charge]" placeholder="service charge" required class="form-control" /></td><td><input type="text" name="demandTerms[' +
                                    i +
                                    '][per]" placeholder="per" required class="form-control" /></td></td><td><button type="button" class="btn btn-outline-danger btn-sm remove-input-field">Delete</button></td></tr>'
                                );
                                el.setAttribute('name', 'demandTerms[' + 0 + '][title]');
                            });
                            $(document).on('click', '.remove-input-field', function() {
                                $(this).parents('tr').remove();
                            });
                        </script>

                        <script>
                            $('#submitForm').on('click', function() {});
                        </script>

                        <script>
                            $('select[name="pay_from"]').on('change', function() {
                                if (this.value == 'Alshoala')
                                    $('input[name="pay_to"]').val('Agent');
                                else
                                    $('input[name="pay_to"]').val('Alshoala');
                            });
                        </script>
                    @endpush


                </div>
            </div>
        </div>
    </div>
</div>

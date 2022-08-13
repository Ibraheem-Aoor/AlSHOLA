<div>
    @section('title', 'ALSHOALA - Admin | AGENTS LIST')
    @push('css')
        <style>
            label,
            th {
                font-size: 0.7rem;
                font-weight: bolder;
            }

            .form-control {
                display: block !important;
                width: 90% !important;
                padding: 0.400rem 0.80rem !important;
                font-size: 0.6rem !important;
                font-weight: 400 !important;
                line-height: 1 !important;
                color: #666565 !important;
                background-color: #fff !important;
                background-clip: padding-box !important;
                border: 1px solid #ced4da !important;
                appearance: none !important;
                border-radius: 2px !important;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
            }

            body {
                height: 30vh !important;
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
                                <h4 class="box-title">All Registerd Agents</h4>
                                <h5 class="text-primary">
                                    REF: {{ $application->ref }}
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
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Demand No.</th>
                                                <th>Client Name</th>
                                                <th>Total</th>
                                                <th>Supply</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($jobs as $job)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td class="">
                                                        <a href="{{ route('admin.demand.details', $job->id) }}">
                                                            {{ $job->post_number }}
                                                        </a>
                                                    </td>
                                                    <td class="">
                                                        {{ $job->user->name }}
                                                    </td>
                                                    <td>{{ $job->qty() }}</td>
                                                    <td>
                                                        {{ $job->applications_count }}
                                                    </td>
                                                    <td>
                                                        {{ $job->qty() - $job->applications_count }}
                                                    </td>
                                                    <td>
                                                        {{ $job->subStatus->name }}
                                                    </td>
                                                    @if ($application->job_id != null)
                                                        @if ($application->job_id == $job->id)
                                                            <td class="">
                                                                <a href="#" wire:click="cancel()"
                                                                    class="btn btn-outline-danger">Cancel</a>
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td class="">
                                                            <a class="btn btn-primary"
                                                                wire:click="apply('{{ $job->id }}')">APPLY</a>
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
                                    {{ $jobs->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->


                    <!--SHOW NOTE  Modal -->

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

<div>
    @section('title', 'ALSHOALA - Admin | NATIONALITY LIST')

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Created Categories</h4>
                                <div class="text-right">
                                    <a href="{{ route('admin.currency.new') }}" class="btn btn-outline-success"><i
                                            class="fa fa-plus"></i> Add Currency</a>
                                </div>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Currency_Symbol</th>
                                                <th>Currency</th>
                                                <th>Cteation_Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($currenccies as $currency)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $currency->key }}
                                                    </td>
                                                    <td>
                                                        {{ $currency->value }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($currency->created_at)->format('Y-M-d') }}</td>
                                                    <td>
                                                        <a wire:click="setCurrencyId('{{ $currency->id }}')"
                                                            data-key="{{ $currency->key }}"
                                                            data-name="{{ $currency->name }}" data-toggle="modal"
                                                            href="#exampleModal">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a wire:click.prevent="deleteCurrency('{{ $currency->id }}')"
                                                            href="#" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center alert alert-warning">No
                                                        Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $currenccies->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->


                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" wire:ignore>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Sector:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form wire:submit.prevent="editCurrency()">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for=""> Currency Key<span class="text-danger">* </span> :</label>
                                            <input type="text" class="form-control" wire:model.lazy="newCurrencyKey"
                                                id="key">
                                            @error('newCurrencyKey')
                                                <span class="text-dagner">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" wire:model.lazy="newCurrencyName"
                                                id="name">
                                            @error('newCurrencyName')
                                                <span class="text-dagner">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">SAVE</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    @push('js')
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                                crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                                                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                                                crossorigin="anonymous"></script>

                        <script>
                            $('#exampleModal').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var key = button.data('key')
                                var name = button.data('name')
                                // var description = button.data('description')
                                var modal = $(this)
                                modal.find('.modal-body #key').val(key);
                                modal.find('.modal-body #name').val(name);
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    @section('title', 'ALSHOALA - Admin | CATEGORY LIST')
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
                                    <a href="{{ route('admin.sector.new') }}" class="btn btn-outline-success"> <i class="fa fa-plus"></i> Add Category</a>
                                </div>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Category_Name</th>
                                                <th>Cteation_Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($categories as $category)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('Y-M-d') }}</td>
                                                    <td>
                                                        <a wire:click="setTargetSectorId('{{ $category->id }}')"
                                                            data-sector="{{ $category->name }}" data-toggle="modal"
                                                            href="#exampleModal">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a wire:click.prevent="deleteSector('{{ $category->id }}')"
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
                                    {{ $categories->links() }}
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
                                <div class="modal-body">
                                    <form wire:submit.prevent="editSector()">
                                        <div class="form-group">
                                            <label for="">Category Name<span class="text-danger">* </span> :</label>
                                            <input type="text" class="form-control" wire:model.lazy="newSectorName"
                                                id="sector">
                                            @error('sector')
                                                <span class="text-dagner">{{ $message }}</span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                var sector = button.data('sector')
                                // var description = button.data('description')
                                var modal = $(this)
                                modal.find('.modal-body #sector').val(sector);
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>

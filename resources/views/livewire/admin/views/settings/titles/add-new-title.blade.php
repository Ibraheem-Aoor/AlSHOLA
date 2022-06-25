<div>
    @section('title' , 'ALSHOALA - Admin | NEW TITLE')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>ADD New Nationality</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="addNewTitle()">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="form-group col-sm-6">
                                            <label for="name" class=" form-control-label">Title:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="newTitle">
                                            @error('newTitle')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="name" class=" form-control-label">Category</label>
                                            <select class="form-control" wire:model.lazy="sector">
                                                <option value="">-- select category</option>
                                                @foreach ($sectors as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-outline-primary col-sm-6">SAVE</button>
                                    </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>
            <script>
                new TomSelect("#select-state", {
                    maxItems: 200
                });
            </script>
        @endpush
    </div>

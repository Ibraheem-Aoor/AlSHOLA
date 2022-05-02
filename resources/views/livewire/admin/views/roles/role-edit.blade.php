<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit {{ $name }} Role</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="editRole()">
                                <div class="container">
                                    <div class="row text-center">

                                        <div class="form-group col-sm-6">

                                            <label for="name" class=" form-control-label">Role Name</label>
                                            <input type="text" id="name" class="form-control" wire:model.lazy="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6"></div>
                                        <div class="form-group col-sm-6">
                                            <div class="card" wire:ignore>

                                                {{-- <input id="tom-select-it"   value="users management , contacts management"/> --}}
                                                <select id="select-state" multiple placeholder="select permession .."
                                                    autocomplete="off" wire:model.lazy="newPermissions">
                                                    @forelse ($allPermissinos as $permession)
                                                        @if ($role->hasPermissionTo($permession))
                                                            @php
                                                                $class = 'selected';
                                                            @endphp
                                                        @else
                                                            @php
                                                                $class = '';
                                                            @endphp
                                                        @endif
                                                        <option value="{{ $permession->id }}" {{ $class }}>
                                                            {{ $permession->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            @error('newPermissions')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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

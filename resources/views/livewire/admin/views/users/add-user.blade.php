<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create New User</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="addNewUser()">
                                <div class="container">
                                    <div class="row ">

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">User Name:</label>
                                            <input type="text" id="name" class="form-control" wire:model.lazy="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">User E-mail:</label>
                                            <input type="email" id="name" class="form-control"
                                                wire:model.lazy="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Password:</label>
                                            <input type="password" id="name" class="form-control"
                                                wire:model.lazy="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">confrim password:</label>
                                            <input type="password" id="name" class="form-control"
                                                wire:model.lazy="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Mobile:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="mobile">
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">User Type:</label>
                                            <select name="" id="" class="form-control" wire:model.lazy="type">
                                                <option value="" selected>choose one</option>
                                                {{-- <option value="">Personal</option> --}}
                                                <option value="Talented">Agent</option>
                                                <option value="Employer">Client</option>
                                                <option value="ALSHOLA">AlSHLOA</option>
                                            </select>
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($type == 'Talented')
                                            <div class="form-group col-sm-6">
                                                <label class=" form-control-label">Nationality:</label>
                                                <select wire:model.lazy="nationality" class="form-control">
                                                    <option value="" selected>-- select one --</option>
                                                    @foreach ($nationalities as $n)
                                                        <option value="{{ $n->id }}">
                                                            {{ $n->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nationality')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @elseif($type == 'Employer')
                                            <div class="form-group col-sm-6">
                                                <label class=" form-control-label">Company Name:</label>
                                                <select wire:model.lazy="companyName" class="form-control">
                                                    <option value="" selected>-- select one --</option>
                                                    @foreach ($registerdComapnies as $company)
                                                        <option value="{{ $company->id }}">
                                                            {{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('companyName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        {{-- @if ($type == 'admin')
                                            <div class="form-group col-sm-12">
                                                <div class="card" wire:ignore>
                                                    <label for="">Roles: </label>
                                                    <select id="select-state" wire:model="roles" multiple
                                                        placeholder="select permession .." autocomplete="off">
                                                        @foreach ($allRoles as $role)
                                                            <option value="{{ $role->id }}">
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('roles')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif --}}
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

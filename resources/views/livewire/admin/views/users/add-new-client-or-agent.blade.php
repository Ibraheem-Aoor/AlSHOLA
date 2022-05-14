<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create New {{$intendedUserType}}</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="addNewUser()">
                                <div class="container">
                                    <div class="row ">

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Name:</label>
                                            <input type="text" id="name" class="form-control" wire:model.lazy="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">E-mail:</label>
                                            <input type="email" id="name" class="form-control"
                                                wire:model.lazy="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Registeration No:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="registerationNo">
                                            @error('registerationNo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Title Position:</label>
                                            <select class="form-control" wire:model.lazy="titlePosition">
                                                <option value="">-- select one --</option>
                                                @foreach ($titles as $title)
                                                    <option value="{{ $title->id }}">{{ $title->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('titlePosition')
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
                                            <label class=" form-control-label">Resposible Person:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="resposebilePerson">
                                            @error('resposebilePerson')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Resposible nationality:</label>
                                            <select class="form-control" wire:model.lazy="responseibleNationality">
                                                <option value="">-- select one --</option>
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('responseibleNationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Country:</label>
                                            <select name="" id="" class="form-control" wire:model.lazy="country">
                                                <option value="">choose one</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Profile Attachment:</label>
                                            <input type="file" class="form-control" wire:model.lazy="profile">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">License Attachment:</label>
                                            <input type="file" class="form-control" wire:model.lazy="license">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">ID:</label>
                                            <input type="file" class="form-control" wire:model.lazy="identity">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Agreement:</label>
                                            <input type="file" class="form-control" wire:model.lazy="agreement">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-outline-primary col-sm-6">CREATE</button>
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

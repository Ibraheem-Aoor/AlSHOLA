<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ $name }} Profile</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="saveProfile()">
                                <div class="form-group">
                                    <div class="input-group">
                                        @if (!$avatar)
                                            @if (Auth::user()->avatar == 'user.png')
                                                <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('storage/uploads/avatars/users/' . Auth::user()->avatar) }}"
                                                    alt="Card image cap">
                                            @else
                                                <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('storage/uploads/avatars/users/' . Auth::id() . '/' . Auth::user()->avatar) }}"
                                                    alt="Card image cap">
                                            @endif
                                        @else
                                            <img class="rounded-circle mx-auto d-block"
                                                src="{{ $avatar->temporaryUrl() }}" alt="Card image cap" width="20%">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Avatar</label>
                                    <input type="file" class="form-control" wire:model="avatar">

                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" wire:model.lazy="name" class="form-control"><br>


                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div><br>
                                        <input type="email" wire:model.lazy="email" class="form-control">


                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="contianer">
                                <div class="row">
                                    <div class="col-sm-12 text-center mb-3 p-4">
                                        <button type="submit" class="btn btn-success col-sm-6">SAVE</button>
                                    </div>
                                    <div class="col-sm-12  ml-auto p-4">
                                        <a href="{{ route('admin.password') }}" type="button"
                                            class="btn btn-primary ">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

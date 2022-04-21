<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{Auth::user()->name}} Profile</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="UpdatePassword()">
                                <div class="form-group">
                                    <div class="input-group">
                                            @if (Auth::user()->avatar == 'user.png')
                                                <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('storage/uploads/avatars/users/' . Auth::user()->avatar) }}"
                                                    alt="Card image cap">
                                            @else
                                                <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('storage/uploads/avatars/users/' . Auth::id() . '/' . Auth::user()->avatar) }}"
                                                    alt="Card image cap">
                                            @endif


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">New Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                        <input type="password" wire:model.lazy="password" class="form-control"><br>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Confirm New Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div><br>
                                        <input type="password" wire:model.lazy="password_confirmation" class="form-control">
                                    </div>
                                    @error('password_confirmation')
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

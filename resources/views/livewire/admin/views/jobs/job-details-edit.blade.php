<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong></strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="editJobPost()">
                                <div class="container">
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Job Title</label>
                                            <input type="text" class="form-control" wire:model.lazy="title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Salary</label>
                                            <div class="input-group">

                                                <input type="text" wire:model.lazy="salary" class="form-control"><br>
                                            </div>
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Location</label>
                                            <div class="input-group">

                                                <input type="text" wire:model.lazy="location"
                                                    class="form-control"><br>
                                            </div>
                                            @error('location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Vacancy</label>
                                            <div class="input-group">

                                                <input type="text" wire:model.lazy="vacancy" class="form-control"><br>
                                            </div>
                                            @error('Vacancy')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Website</label>
                                            <div class="input-group">

                                                <input type="text" wire:model.lazy="website" class="form-control"><br>
                                            </div>
                                            @error('website')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">End Date</label>
                                            <div class="input-group">

                                                <input type="date" wire:model.lazy="endDate" class="form-control"><br>
                                            </div>
                                            @error('endDate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Nature</label>
                                            <div class="input-group">
                                                <select class="form-control"  wire:model.lazy="nature">
                                                    <option value="full time">Full Time</option>
                                                    <option value="part time">Part Time</option>
                                                </select>
                                            </div>
                                            @error('nature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Status</label>
                                            <div class="input-group">
                                                <select class="form-control"  wire:model.lazy="status">
                                                    <option value="active">Active</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="pending">Pending</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Descreption</label>
                                            <div class="input-group">
                                                <textarea class="form-control" wire:model.lazy="descreption">{{ $descreption }}</textarea>
                                            </div>
                                            @error('descreption')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Responsebilities</label>
                                            <div class="input-group">
                                                <textarea class="form-control" wire:model.lazy="responsebilites">{{ $responsebilites }}</textarea>
                                            </div>
                                            @error('responsebilites')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Requirements</label>
                                            <div class="input-group">
                                                <textarea class="form-control" wire:model.lazy="descreption">{{ $requirements }}</textarea>
                                            </div>
                                            @error('requirements')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 text-center mb-3 p-4">
                                                    <button type="submit" class="btn btn-success col-sm-6">SAVE</button>
                                                </div>
                                                <div class="col-sm-12  ml-auto p-4">
                                                    <a href="{{ route('admin.dashboard') }}" type="button"
                                                        class="btn btn-outline-info ">
                                                        Cancel
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
    </div>

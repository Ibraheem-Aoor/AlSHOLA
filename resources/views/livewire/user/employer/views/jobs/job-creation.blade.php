<div>
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded">
            <div class="col-sm-12">
                <form wire:submit.prevent="postNewJob()" enctype="multipart/form-data">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <h6 class="mb-4">Post New Job</h6>
                                <div class="form-floating mb-3 col-sm-6">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" wire:model.lazy="title">
                                    <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                               
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-6">
                                    <input type="text" class="form-control" id="floatingPassword"
                                        wire:model.lazy="salary">
                                    <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-6">
                                    <input type="text" class="form-control" id="floatingPassword"
                                        wire:model.lazy="location">
                                    <label for="floatingPassword">&nbsp;&nbsp; Location</label>
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-6">
                                    <input type="text" class="form-control" id="floatingPassword"
                                        wire:model.lazy="employerWebsite">
                                    <label for="floatingPassword">&nbsp;&nbsp; Company Website</label>
                                    @error('employerWebsite')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-6">
                                    <input type="file" class="form-control" id="floatingPassword" multiple
                                        wire:model="attachments">
                                    <label for="floatingPassword">&nbsp;&nbsp; Company Website</label>
                                    @error('attachments')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                        wire:model.lazy="description"></textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col-sm-12 mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                        wire:model.lazy="requirements"></textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Requirements</label>
                                    @error('requirements')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col-sm-12 mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                        wire:model.lazy="responsibilities"></textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Responsebilites</label>
                                    @error('responsibilities')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col-sm-12 mb-3">
                                    <button type="submit" class="btn btn-primary col-sm-12">POST NEW JOB</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

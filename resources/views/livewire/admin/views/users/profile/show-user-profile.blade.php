<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Profile {{ $intendedUSerType }} : {{ $user->name }}</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="updateProfile()">
                                <div class="container">
                                    <div class="row ">

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Name:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">E-mail:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="email">
                                            @error('email')
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
                                            <label class=" form-control-label">country:</label>
                                            <select class="form-control" wire:model.lazy="country">
                                                @foreach ($countries as $country)
                                                    {{-- <option value="$"></option> --}}
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Responsible Person:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="responsible_person">
                                            @error('responsible_person')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- @if ($user->company) --}}
                                            <div class="form-group col-sm-6">
                                                <label class=" form-control-label">Company:</label>
                                                <select class="form-control" wire:model.lazy="company">
                                                    @foreach ($companies as $company)
                                                        {{-- <option value="$"></option> --}}
                                                        <option value="{{ $company->id }}">{{ $company->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('company')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        {{-- @endif --}}

                                        <button type="submit" class="btn btn-success col-sm-12">UPDATE</button>
                            </form>

                        </div>

                        @if ($user->personalAttachments() != [])
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-stats order-table ov-h">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th class="serial">#</th>
                                                        <th>File Name</th>
                                                        <th>File type</th>
                                                        <th>Uploaded_at</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @forelse($user->personalAttachments as $file)
                                                        <tr>
                                                            <td class="serial">{{ $i++ }}
                                                            </td>
                                                            <td>
                                                                <a href="#">
                                                                    {{ $file->name }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $file->folder }}
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($file->created_at)->format('Y-M-d')}}
                                                            </td>
                                                            <td>
                                                                <a href="
                                                                            {{ route('admin.user.attachment.download', ['userId' => $user->id, 'folderName' => $file->folder, 'fileName' => $file->name]) }}
                                                                            "
                                                                    class="text-primary"><i
                                                                        class="fa fa-download"></i></a>
                                                                <a href="" class="text-info"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="
                                                                            #
                                                                            "
                                                                    class="text-danger"><i class="fa fa-teash"></i></a>
                                                                <a href="" class="text-danger"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-center alert alert-warning">
                                                                No Records
                                                                Yet!
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-stats -->
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

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

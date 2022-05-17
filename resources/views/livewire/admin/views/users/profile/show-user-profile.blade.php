<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create New</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="addNewUser()">
                                <div class="container">
                                    <div class="row ">

                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Name:</label>
                                            <input type="text" id="name" class="form-control"
                                                value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">E-mail:</label>
                                            <input type="text" id="name" class="form-control"
                                                value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Mobile:</label>
                                            <input type="text" id="name" class="form-control"
                                                value="{{ $user->mobile }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">country:</label>
                                            <input type="text" id="name" class="form-control"
                                                value="{{ $user->country->name }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class=" form-control-label">Responsible Person:</label>
                                            <input type="text" id="name" class="form-control"
                                                value="{{ $user->responsible_person }}">
                                        </div>
                                        @if ($user->company)
                                            <div class="form-group col-sm-6">
                                                <label class=" form-control-label">Company:</label>
                                                <input type="text" id="name" class="form-control"
                                                    value="{{ $user->company->name }}">
                                            </div>
                                        @endif
                                    </div>

                                    @if ( $user->personalAttachments() != [])
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
                                                                            {{ $file->created_at }}
                                                                        </td>
                                                                        <td>
                                                                            <a href="
                                                                            {{route('admin.user.attachment.download' , ['userId' => $user->id , 'folderName' => $file->folder , 'fileName' => $file->name])}}
                                                                            " class="text-primary"><i class="fa fa-download"></i></a>
                                                                            <a href="" class="text-info"><i class="fa fa-eye"></i></a>
                                                                            <a href="
                                                                            #
                                                                            " class="text-danger"><i class="fa fa-teash"></i></a>
                                                                            <a href="" class="text-danger"><i class="fa fa-trash"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="7"
                                                                            class="text-center alert alert-warning">
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

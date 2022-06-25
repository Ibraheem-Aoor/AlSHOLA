<div>
    @section('title', 'ALSHOALA - Admin | NEW JOB POST')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>New Job Post</strong><small></small>
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="createNewDemand()">
                                <div class="container">
                                    <div class="row ">

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Category:</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="category">
                                                <option value="">-- select one --</option>
                                                @foreach ($categoires as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                                <option value=""></option>
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Title Position:</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="title">
                                                <option value=""> -- select one --</option>
                                                @foreach ($titles as $title)
                                                    <option value="{{ $title->id }}">{{ $title->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Nationality</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="nationality">
                                                <option value="">-- select one --</option>
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">
                                                        {{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Salary:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="salary">
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Currency:</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="currency">
                                                <option value="completed">-- select one --</option>
                                                @foreach ($currencies as $currency)
                                                    <option value="{{$currency->key}}">{{$currency->value}}</option>
                                                @endforeach
                                            </select>
                                            @error('currency')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Current Status:</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="currentStatus">
                                                <option value="completed">Completed</option>
                                                <option value="active">Active</option>
                                                <option value="pending">Pending</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                            @error('currentStatus')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Age:</label>
                                            <select id="name" class="form-control" wire:model.lazy="age">
                                                <option value="">-- select one --</option>
                                                <option value="Below 40">Below 40</option>
                                                <option value="Below 50">Below 50</option>
                                                <option value="Below 60">Below 60</option>
                                            </select>
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Sex:</label>
                                            <select id="name" class="form-control" wire:model.lazy="sex">
                                                <option value="">-- select one --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('sex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Client:</label>
                                            <select type="text" id="name" class="form-control"
                                                wire:model.lazy="client">
                                                <option value="">-- select one --</option>
                                                @foreach ($clients as $chunkOfClients)
                                                    @foreach ($chunkOfClients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('client')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Requested By:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="requestBy">
                                            @error('requestBy')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Descreption:</label>
                                            <textarea type="text" id="name" class="form-control" style="height: 150px" wire:model.lazy="descreption"></textarea>
                                            @error('descreption')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-outline-primary col-sm-3">CREATE</button>
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
</div>

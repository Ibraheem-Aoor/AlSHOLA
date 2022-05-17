<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>New Demand</strong><small></small>
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
                                                    <option value="{{ $title->id }}">{{ $title->name }}</option>
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
                                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}
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
                                            <label class=" form-control-label">Quantity:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="quantity">
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Contact Period:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="contactPeriod">
                                            @error('contactPeriod')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Working Hours:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="workingPerHours">
                                            @error('workingPerHours')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Working Days:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="workingPerDays">
                                            @error('workingPerDays')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Off Day:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="offDay">
                                            @error('offDay')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Accommodation:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="accommodation">
                                            @error('accommodation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Transport:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="transport">
                                            @error('transport')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Medical:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="medical">
                                            @error('medical')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Insurance:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="insurance">
                                            @error('insurance')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Food:</label>
                                            <input type="text" id="name" class="form-control" wire:model.lazy="food">
                                            @error('food')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Annual Leave:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="annualLeave">
                                            @error('annualLeave')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Air Ticket:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="airTicket">
                                            @error('airTicket')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Over Time Salary:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="overTimeSalary">
                                            @error('overTimeSalary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class=" form-control-label">Covid_19 Test:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model.lazy="covid_19">
                                            @error('covid_19')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class=" form-control-label">Other Terms:</label>
                                            <textarea type="text" id="name" class="form-control" style="height: 150px" wire:model.lazy="otherTerms"></textarea>
                                            @error('otherTerms')
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

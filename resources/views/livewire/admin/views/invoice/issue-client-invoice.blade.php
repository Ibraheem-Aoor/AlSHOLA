<div>
    @section('title', 'ALSHOALA - Admin | NEW NATIONALITY')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body card-block">
                            <form wire:submit.prevent="addSubInvoice()">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="form-group col-sm-3">
                                            <label for="name" class=" form-control-label">Select Title:</label>
                                            <select name="title" class="form-control" required
                                                wire:model="selectedApplicationId" wire:change="setCharge()">
                                                <option>--- select one ---</option>
                                                @foreach ($applications as $application)
                                                    @if ($application->subStatus->name == 'Arrived')
                                                        <option value="{{ $application->id }}">
                                                            {{ $application->title->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('selectedApplicationId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="name" class=" form-control-label">Quantity:</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model="quantity" required>
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="name" class=" form-control-label">Charge:</label>
                                            <input type="text" id="name" class="form-control" required
                                                wire:model="charge">
                                            @error('charge')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="name" class=" form-control-label">Description:</label>
                                            <textarea type="text" id="name" wire:model="discription" class="form-control" required> </textarea>
                                            @error('discription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <button type="submit" id="add-new-title"
                                            class="btn btn-outline-primary col-sm-6">ADD</button>
                                    </div>
                                </div>

                                @if ($subInvoices != null)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 text-center card mb-5 mt-5" id="add-new-title-dev">
                                                <div class="card-body">
                                                    <table class="table table-responsive" id="newTtile"
                                                        style="width: 100%;">
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Quantity</th>
                                                            <th>charge</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        @forelse($subInvoices as $key => $invc)
                                                            <tr>
                                                                @php
                                                                    $title = \App\Models\Application::with('title')->find($invc['application_id'])->title->name;
                                                                @endphp
                                                                <td>{{ $title }}</td>
                                                                <td>{{ $invc['quantity'] }}</td>
                                                                <td>{{ $invc['charge'] }}</td>
                                                                <td>{{ Str::limit($invc['description'], 40, '...') }}
                                                                </td>
                                                                <td>
                                                                    {{-- <a href="" title="show description"><i
                                                                            class="fa fa-eye"></i></a> --}}
                                                                    <a wire:click.prevent="deleteSubInvoice({{ $key }})"
                                                                        title="delete"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </form>
                            @if ($subInvoices != null)
                                <div class="col-sm-12">
                                    <button wire:click.prevent="issueInvoice()"
                                        class="btn btn-outline-success col-sm-12" id="issue">Issue
                                        Invoice</button>
                                </div>
                            @endif

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

            {{-- <script>
                $(document).ready(function() {
                    $('#add-new-title-dev').hide();

                    var i = 0;
                    $('#add-new-title').on('click', function() {
                        $('#add-new-title-dev').show();
                        $('#issue').show();

                        var title, qty, salary, description;
                        var elements = document.getElementById("my-form").elements;
                        elements.forEach(element => {
                            if (element.name == 'title') {
                                title = element.value;
                            } else if (element.name == 'quantity') {
                                qty = element.value;
                            } else if (element.name == 'salary') {
                                salary = element.value;
                            } else if (element.name == 'age') {
                                age = element.value;
                            }
                        });
                        ++i;
                        $('#newTtile').append(
                            '<tr><td><input type="text" name="subJob[' + i +
                            '][sector]" readonly class="form-control" value = "' +
                            sector +
                            ' " /></td><td><input type="text" name="subJob[' + i +
                            '][title]" placeholder="Enter Year" readonly class="form-control" value = "' +
                            title +
                            ' " /></td><td><input type="text" name="subJob[' + i +
                            '][quantity]" placeholder="Enter educational body" readonly class="form-control" value = "' +
                            qty +
                            ' " /></td><td><input type="text" name="subJob[' + i +
                            '][salary]" readonly class="form-control" value = "' +
                            salary +
                            ' " /></td><td><input type="text" name="subJob[' + i +
                            '][gender]" readonly class="form-control" value = "' +
                            gender +
                            ' " /></td>' + '<td><input type="text" name="subJob[' + i +
                            '][age]" readonly class="form-control" value = "' +
                            age +
                            ' " /></td>' +
                            ' " /></td>' + '<td><input type="text" name="subJob[' + i +
                            '][nationality]" readonly class="form-control" value = "' +
                            nationality +
                            ' " /></td>' +
                            '<td><button type="button" class="btn btn-outline-danger remove-edu-input-field">Delete</button></td></tr>'
                        );
                        $(document).on('click', '.remove-edu-input-field', function() {
                            $(this).parents('tr').remove();
                        });
                    });
                });
            </script> --}}
        @endpush
    </div>

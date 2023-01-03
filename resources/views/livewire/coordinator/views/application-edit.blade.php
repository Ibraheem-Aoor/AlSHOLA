<div>
    @push('css')
        <style>
            table tr td,
            th {
                font-size: 12px !important;
                text-transform: none !important;
                text-decoration: none !important;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endpush
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert"></div>
                                @endif
                                <h4 class="box-title">Edit Application {{ $application->ref }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('broker.application.update', $application->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">


                                                Full_Name:
                                                <input required class="form-control" type="text" name="full_name"
                                                    value="{{ $application->full_name }}">

                                            </div>

                                            <div class="col-sm-3">
                                                Position Applied For:
                                                <select required class="form-control" name=""id="">
                                                    <option value="">--select one -- </option>
                                                    @foreach ($titles as $title)
                                                        <option value="{{ $title->id }}"
                                                            @if ($application->title_id == $title->id) selected @endif>
                                                            {{ $title->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                Address:
                                                <input required class="form-control" type="text" name="address"
                                                    value="{{ $application->address }}">
                                            </div>

                                            <div class="col-sm-3">

                                                Contact_No:
                                                <input required class="form-control" type="text" name="contact_no"
                                                    value="{{ $application->contact_no }}">

                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-3">
                                                Passport_No:
                                                <input required class="form-control" type="text" name="passport_no"
                                                    value="{{ $application->passport_no }}">
                                            </div>
                                            <div class="col-sm-3">
                                                Place Issued:
                                                <input required class="form-control" type="text" name="place_issued"
                                                    value="{{ $application->place_issued }}">
                                            </div>
                                            <div class="col-sm-3">
                                                Place Of Birth:
                                                <input required class="form-control" type="text"
                                                    name="place_of_birth"
                                                    value="{{ $application->place_of_birth ?? 'UNKOWN' }}">
                                            </div>
                                            <div class="col-sm-3">
                                                Date Issued:
                                                <input required class="form-control" type="date" name="date_issued"
                                                    value="{{ $application->date_issued }}">
                                            </div>
                                        </div>


                                        <div class="row mt-4">


                                            <div class="col-sm-3">


                                                Expiry Dte:
                                                <input required class="form-control" type="date" name="expiry_issued"
                                                    value="{{ $application->expiry_issued }}">
                                            </div>
                                            <div class="col-sm-3">

                                                Relegion:
                                                <select required class="form-control" name="relegion"
                                                    class="form-control">
                                                    <option value="" selected>--select --</option>
                                                    <option value="Muslim"
                                                        @if ($application->relegion == 'Muslim') selected @endif>
                                                        Muslim
                                                    </option>
                                                    <option value="Christian"
                                                        @if ($application->relegion == 'Christian') selected @endif>
                                                        Christian
                                                    </option>
                                                    <option value="Hindu"
                                                        @if ($application->relegion == 'Hindu') selected @endif>
                                                        Hindu
                                                    </option>
                                                    <option value="Buddhist"
                                                        @if ($application->relegion == 'Buddhist') selected @endif>
                                                        Buddhist
                                                    </option>
                                                    <option value="other"
                                                        @if ($application->relegion == 'other') selected @endif>
                                                        other
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                Visa_Number:
                                                <input required class="form-control" type="text" name="visa_number"
                                                    value="{{ $application->visa_number ?? null }}">
                                            </div>
                                            <div class="col-sm-3">
                                                flight_ticket:
                                                <input required class="form-control" type="text" name="flight_ticket"
                                                    value="{{ $application->flight_ticket }}">
                                            </div>
                                        </div>
                                        <div class="row mt-4">


                                            <div class="col-sm-3">
                                                Sex
                                                <select required class="form-control" required name="sex"
                                                    class="form-control">
                                                    <option value="">-- select --</option>
                                                    <option value="male"
                                                        @if ($application->sex == 'male') {{ 'selected' }} @endif>
                                                        Male
                                                    </option>
                                                    <option value="female"
                                                        @if ($application->sex == 'female') {{ 'selected' }} @endif>
                                                        Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                children:
                                                <input required class="form-control" type="text" name="children"
                                                    value="{{ $application->children }}">
                                            </div>
                                            <div class="col-sm-3">
                                                height:
                                                <input required class="form-control" type="text" name="height"
                                                    value="{{ $application->height }}">

                                            </div>
                                            <div class="col-sm-3">
                                                weight:
                                                <input required class="form-control" type="text" name="weihgt"
                                                    value=" {{ $application->weihgt }}">
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <table>
                                                    {{-- Arabic Language --}}
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <label>Language:</label>
                                                                <input required type="text" value="Arabic" readonly
                                                                    class="form-control">
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div>
                                                                <label>Speak:</label>
                                                                <select required name="arabic_speak"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->arabic_speak == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->arabic_speak == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->arabic_speak == 'fair') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->arabic_speak == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('arabic_speak')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div>
                                                                <label>Understand:</label>
                                                                <select required name="arabic_understand"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->arabic_understand == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->arabic_understand == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->arabic_understand == 'fair') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->arabic_understand == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('arabic_understand')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <label>Read:</label>
                                                                <select required name="arabic_read"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->arabic_read == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->arabic_read == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->arabic_read == 'fair') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->arabic_read == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('arabic_read')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div>
                                                                <label>Write:</label>
                                                                <select required name="arabic_write"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->arabic_write == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->arabic_write == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->arabic_write == 'fair') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->arabic_write == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('arabic_write')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                    </tr>



                                                    {{-- English Language --}}
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <label>Language:</label>
                                                                <input required type="text" value="English"
                                                                    readonly class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <label>Speak:</label>
                                                                <select required name="english_speak"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->english_speak == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->english_speak == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->english_speak == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->english_speak == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('english_speak')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div>
                                                                <label>Understand:</label>
                                                                <select required name="english_understand"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->english_understand == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->english_understand == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->english_understand == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->english_understand == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('english_understand')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div>
                                                                <label>Read:</label>
                                                                <select required name="english_read"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->english_read == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->english_read == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->english_read == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->english_read == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('english_read')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div>
                                                                <label>Write:</label>
                                                                <select required name="english_write"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->english_write == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->english_write == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->english_write == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->english_write == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('english_write')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- Hindi Langauge --}}

                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <label>Language:</label>
                                                                <input required type="text" name="third_language"
                                                                    class="form-control"
                                                                    value="{{ $application->third_language }}">
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div>
                                                                <label>Speak:</label>
                                                                <select required name="hindi_speak"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->hindi_speak == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->hindi_speak == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->hindi_speak == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->hindi_speak == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('hindi_speak')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div>
                                                                <label>Understand:</label>
                                                                <select required name="hindi_understand"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->hindi_understand == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->hindi_understand == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->hindi_understand == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->hindi_understand == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('hindi_understand')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div>
                                                                <label>Read:</label>
                                                                <select required name="hindi_read"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->hindi_read == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->hindi_read == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->hindi_read == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->hindi_read == 'poor') selected @endif>
                                                                        Poor</option>
                                                                </select>
                                                                @error('hindi_read')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>



                                                            <div>
                                                                <label>Write:</label>
                                                                <select required name="hindi_write"
                                                                    class="form-control">
                                                                    <option value="">-level-</option>
                                                                    <option value="excellent"
                                                                        @if ($application->hindi_write == 'excellent') selected @endif>
                                                                        Excellent</option>
                                                                    <option value="good"
                                                                        @if ($application->hindi_write == 'good') selected @endif>
                                                                        Good</option>
                                                                    <option value="fair"
                                                                        @if ($application->hindi_write == 'excellent') selected @endif>
                                                                        Fair</option>
                                                                    <option value="poor"
                                                                        @if ($application->hindi_write == 'poor') selected @endif>
                                                                        Poor</option>>
                                                                </select>
                                                                @error('hindi_write')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-4">

                                            <button type="submit" class="btn btn-success">SVAVE</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->





        </div>



    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="sendNoteToAppliedTalent()">
                    <div class="modal-body">
                        <textarea class="form-control" cols="30" rows="10" wire:model.lazy="note"></textarea>
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    @endpush


</div>
</div>

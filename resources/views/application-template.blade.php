<div class="row mt-2">
    <div class="col-sm-12 items-align-center">
        @php
            $photo = $application->attachments->where('type', 'Personal Photo')->first()->name;
        @endphp
        <img src="{{ Storage::url('public/uploads/applications/' . $application->id . '/attachments' . '/' . $photo) }}"
            width="200" height="200" style="margin:auto;border: 1px solid black;">
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-12">
        <caption style="color:red;font-weight:600;">General Information</caption>
        <table class="table table-responsive">
            <tr>
                <td>Ref: {{ $application->ref }}</td>
                <td>Date:
                    {{ \Carbon\Carbon::parse($application->created_at)->format('Y-M-d') }}
                </td>



                <td>Full Name:
                    {{ $application->full_name }}</td>
                <td>
                    Position Applied For:
                    {{ $application->title->name }}
                </td>
            </tr>
            <tr>
                <td>Address:
                    {{ $application->address }}</td>
                <td>Contact_No:
                    {{ $application->contact_no }}
                </td>

                <td>Passport No:
                    {{ $application->passport_no }}
                </td>
                <td>Place Issued:
                    {{ $application->place_issued }}
                </td>

            </tr>


            <tr id="tt">

                <td>Date Issued:
                    {{ $application->date_issued }}
                </td>
                <td>Expiry Date:
                    {{ $application->expiry_issued }}
                </td>
                <td>Nationality:
                    {{ $application->nationality ?? 'UNKOWN' }}
                </td>

                <td>Place Of Birth:
                    {{ $application->place_of_birth ?? 'UNKOWN' }}
                </td>


            </tr>

            <tr>
                <td>Age: {{ $application->age }}</td>

                <td>Relegion:
                    {{ $application->relegion }}</td>


                <td>Visa Number:
                    {{ $application->visa_number ?? 'NONE' }}
                </td>
                <td>Flight Ticket:
                    {{ \Carbon\Carbon::parse($application->flight_ticket)->format('Y-M-d') ?? 'NONE' }}
                </td>

            </tr>

            <tr>
                <td>status:
                    {{ $application->subStatus->name }}</td>
                <td>sex: {{ $application->sex }}</td>

                <td>children:
                    {{ $application->children }}</td>
                <td>height:
                    {{ $application->height }}</td>
            </tr>
            <tr>
                <td colspan="2">weight:
                    {{ $application->weihgt }}</td>
                <td colspan="">
                    Coordinator: {{ $application?->job?->broker?->name }}
                </td>
            </tr>
        </table>
    </div>

    {{-- Language Level --}}
    <div class="col-sm-12">
        <caption  style="color:red;font-weight:600;">Language Level</caption>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Language</th>
                        <th scope="col">Speak</th>
                        <th scope="col">Understand</th>
                        <th scope="col">Read</th>
                        <th scope="col">Write</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ 1 }}</th>
                        <td>Arabic</td>
                        <td>{{ $application->arabic_speak }}</td>
                        <td>{{ $application->arabic_understand }}</td>
                        <td>{{ $application->arabic_read }}</td>
                        <td>{{ $application->arabic_write }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ 2 }}</th>
                        <td>English</td>
                        <td>{{ $application->english_speak }}</td>
                        <td>{{ $application->english_understand }}</td>
                        <td>{{ $application->english_read }}</td>
                        <td>{{ $application->english_write }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ 3 }}</th>
                        <td>Hindi</td>
                        <td>{{ $application->hindi_speak }}</td>
                        <td>{{ $application->hindi_understand }}</td>
                        <td>{{ $application->hindi_read }}</td>
                        <td>{{ $application->hindi_write }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Experince --}}
    <div class="col-sm-12 ">
        <div class="table-responsive">
            <caption  style="color:red;font-weight:600;">Work Experince</caption>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employer Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Country</th>
                        <th scope="col">Designation</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($application->employers as $emplyoer)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $emplyoer->name }}</td>
                            <td>{{ $emplyoer->duration }}</td>
                            <td>{{ $emplyoer->country }}</td>
                            <td>{{ $emplyoer->designation }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="alert alert-warning  bg-dark" style="color:#fff">
                                No Records Yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-center text-danger">Total Experince:
                            {{ \App\Models\Employer::where('application_id', $application->id)->sum('duration') }}
                            Year</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Education --}}
    <div class="col-sm-12 ">
        <div class="table-responsive">
            <caption>Education</caption>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Year</th>
                        <th scope="col">Educational Body</th>
                        <th scope="col">Country</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($application->educations as $edu)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $edu->degree }}</td>
                            <td>{{ $edu->year }}</td>
                            <td>{{ $edu->collage }}</td>
                            <td>{{ $edu->country }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="alert alert-warning  bg-dark" style="color:#fff">
                                No Records Yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

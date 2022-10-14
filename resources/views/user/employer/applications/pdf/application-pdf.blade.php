<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            margin: 0 !important;
            padding: 0 !important;
        }

        table {
            font-family: arial, sans-serif;
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }

        .fromDiv {
            width: 100%;
        }

        .fromDiv p {
            display: inline-block;
            margin: 0px 30px;
        }


        .parent {
            /* border: 1px solid black; */
            margin-top: 10px !important;
            padding: 2rem 2rem;
            text-align: center;
        }

        .child {
            display: inline-block;
            /* border: 1px solid #000; */
            padding: 2rem 2rem;
            vertical-align: middle;
            min-height: 100px !important;
        }

        .tableNoBorder td {
            border: none !important;
        }

        table tr td {
            padding: 2px !important;
        }

        .text-left {
            text-align: left !important;
        }

        .text-right {
            text-align: right !important;
        }

        body {
            height: 3508px !important;
            padding-left: 15px !important;
            padding-right: 5px !important;
        }

        .bold {
            font-weight: bold !important;
        }
    </style>
</head>

<body>


    {{-- <table>
        <tr>
            <th>Demand SR</th>
            <th>Demand Category</th>
            <th> Title</th>
            <th>status</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>{{ $application->job->post_number }}</td>
            <td>{{ $application->title->sector->name }}</td>
            <td>{{ $application->title->name }}</td>
            <td>{{ $application->job->status }}</td>
            <td>{{ $application->job->created_at }}</td>
        </tr>
    </table> --}}
    <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="60%" style="margin-left:50%;">
    <div class="parent" style="margin-top:5%;">
        {{-- <div class="child" style="margin-right:40px !important;">
            <p style="padding: 3px;">
                Agent Name: {{ $application->user->name }}
            </p>
            @isset($application->user->responsible_person)
                <p style="padding: 3px;">
                    Represntative: {{ $application->user->responsible_person }}
                </p>
            @endisset
            <p style="padding: 3px;">
                Mobile: {{ $application->user->mobile }}
            </p>
            <p style="padding: 3px;">
                E-mail: {{ $application->user->email }}
            </p>
        </div> --}}
        {{-- <div class="child" style="" class="child" style="margin-left:10px !important;"> --}}
        <p style="padding: 3px;">
            Application Information
        </p>
        <p style="padding: 3px;">
            DSR: {{ $application->job->post_number }}
        </p>
        <p style="padding: 3px;">
            &nbsp;
        </p>
    </div>
    </div>
    <div style="width:100 !important;text-align:center !important;margin-bottom:1% !important;">
        <img src="{{ $photo_src }}" width="200" height="200"
            style="margin-left:45% !important; border: 1px solid black;">
    </div>
    <table style="margin-top: -150px">
        <tr>
            <td><span class="bold">Date:</span>
                {{ \Carbon\Carbon::parse($application->created_at)->format('Y-M-d') }}
            </td>
            <td><span class="bold">Ref: </span> {{ $application->ref }}</td>
        </tr>
        <tr>
            <td colspan="" style="font-size: 13px !important;">
                <span class="bold">Coordinator: </span> {{ $application?->job?->broker?->name }}
            </td>
        </tr>
        <tr>
            <td>
                <span class="bold">Position Applied For: </span>
                {{ $application->title->name }}
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="4" class="" style="font-weight:bold !imoportant;">
                <h3>Personal Information</h3>
            </td>
        </tr>
        <tr>
            <td><span class="bold">Full Name: </span>
                {{ $application->full_name }}</td>
        </tr>
        <tr>
            <td><span class="bold">Nationality: </span>
                {{ \App\Models\Nationality::whereId($application->nationality)->first()?->name ?? 'UNKOWN' }}
            </td>
            <td><span class="bold">Passport No: </span>
                {{ $application->passport_no }}
            </td>
            <td><span class="bold">Issue Place: </span>
                {{ $application->place_issued }}
            </td>

            <td><span class="bold">Place Of Birth: </span>
                {{ $application->place_of_birth ?? 'UNKOWN' }}
            </td>

        </tr>
        <tr>
            <td><span class="bold">Issue Date: </span>
                {{ $application->date_issued }}
            </td>
            <td><span class="bold">Exp Date: </span>
                {{ $application->expiry_issued }}
            </td>
        </tr>
        <tr>
            <td><span class="bold">Address: </span>
                {{ $application->address }}</td>
            <td><span class="bold">Contact No:</span>
                {{ $application->contact_no }}
            </td>

        </tr>


        <tr>
            <td><span class="bold">Age: </span> {{ $application->age }}</td>

            <td><span class="bold">Relegion: </span>
                {{ $application->relegion }}</td>


            <td><span class="bold">Visa Number: </span>
                {{ $application->visa_number ?? 'NONE' }}
            </td>
            <td><span class="bold">Flight Ticket: </span>
                {{ \Carbon\Carbon::parse($application->flight_ticket)->format('Y-M-d') ?? 'NONE' }}
            </td>

        </tr>

        <tr>
            <td><span class="bold">status: </span>
                {{ $application->subStatus->name }}</td>
            <td><span class="bold">sex:</span> {{ $application->sex }}</td>

            <td><span class="bold">children: </span>
                {{ $application->children }}</td>
            <td><span class="bold">height: </span>
                {{ $application->height }}</td>
        </tr>
        <tr>
            <td colspan="2"><span class="bold">weight:</span>
                {{ $application->weihgt }}</td>

        </tr>

    </table>

    <br><br>

    <h3>Language Level</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Language</th>
                <th scope="col">Speak</th>
                <th scope="col">Understand</th>
                <th scope="col">Read</th>
                <th scope="col">Write</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Arabic</td>
                <td>{{ $application->arabic_speak }}</td>
                <td>{{ $application->arabic_understand }}</td>
                <td>{{ $application->arabic_read }}</td>
                <td>{{ $application->arabic_write }}</td>
            </tr>
            <tr>
                <td>English</td>
                <td>{{ $application->english_speak }}</td>
                <td>{{ $application->english_understand }}</td>
                <td>{{ $application->english_read }}</td>
                <td>{{ $application->english_write }}</td>
            </tr>
            <tr>
                <td>Hindi</td>
                <td>{{ $application->hindi_speak }}</td>
                <td>{{ $application->hindi_understand }}</td>
                <td>{{ $application->hindi_read }}</td>
                <td>{{ $application->hindi_write }}</td>
            </tr>
        </tbody>
    </table>
    <br><br>


    <h3>Education</h3>
    <table>
        <thead>
            <tr>
                <th>Degree</th>
                <th>Year</th>
                <th>Educational Body</th>
                <th>Country</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($application->educations as $edu)
                <tr>
                    <td>{{ $edu->degree }}</td>
                    <td>{{ $edu->year }}</td>
                    <td>{{ $edu->collage }}</td>
                    <td>{{ $edu->country }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>



    <br><br>

    <h3>Working Experince In <span style="color: red">GCC/ABROAD</span></h3>
    <table>
        <tr>
            <th>Employer</th>
            <th>Duration</th>
            <th>Country</th>
            <th>Designation</th>
        </tr>
        <tr>
            @foreach ($application->employers as $emplyoer)
        <tr>
            <td>{{ $emplyoer->name }}</td>
            <td>{{ $emplyoer->duration }}</td>
            <td>{{ $emplyoer->country }}</td>
            <td>{{ $emplyoer->designation }}</td>
        </tr>
        @endforeach
        </tr>
        <tr>
            <td>Total Experince: </td>
            <td>{{ @$application->employers?->sum('duration') ?? '' }}</td>
        </tr>
    </table>
    <br><br>
    <table class="tableNoBorder">
        <tr>
            <td class="text-left">
                <span class="bold">Applicant Interviewed By: </span>{{ $application->applicant_interviewd_by }}
            </td>
            <td class="text-right" style="padding-right:15% !important;">
                <span class="bold">Recommendations: </span> {{ $application->recommendations }}
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td class="text-left"><span class="bold">FOR OFFICAL ONLY</span></td>
            <td class="text-right" style="padding-right:15.5% !important;"><span class="bold">Minimum Expected
                    Salary:</span> {{ $application->min_salary }}
            </td>
        </tr>
        <tr>
            <td class="text-left"><span class="bold">Signature:</span> </td>
            <td class="text-right" style="padding-right:22% !important;"><span class="bold">Date:</span> </td>
        </tr>
    </table>
</body>

</html>

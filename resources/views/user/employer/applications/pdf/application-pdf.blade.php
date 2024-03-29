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

        .text-center {
            text-align: center !important;
        }

        body {
            height: 3508px !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
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
    <table>
        <tr>
            <td colspan="2" style="text-align:center !important;border:none !important;">
                <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="40%" style="margin-left:50%;">
            </td>
        </tr>
    </table>
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
        <h1>Application Form</h1>
        </p>
        <p style="padding: 3px;">
            &nbsp;
        </p>
    </div>
    </div>
    <table class="tableNoBorder">
        <tr>
            <td style="width:30% !important;margin-left:5% !important;margin-right:5% !important;">
                <table class="tableNoBorder">
                    <ul>
                        <li><span class="bold">Date:</span>
                            {{ \Carbon\Carbon::parse($application->created_at)->format('Y-M-d') }}
                        </li>
                        <li><span class="bold">Ref: </span> {{ $application->ref }}</li>
                        <li><span class="bold">DSR: </span> {{ $application->job->post_number }}</li>
                        <li>
                            <span class="bold">Coordinator: </span> {{ $application?->job?->broker?->name }}
                        </li>
                        <li><span class="bold">Visa Number: </span>{{ $application->visa_number ?? 'NONE' }}
                        </li>
                        <li><span class="bold">Flight Ticket:
                            </span>{{ \Carbon\Carbon::parse($application->flight_ticket)->format('Y-M-d') ?? 'NONE' }}
                        </li>
                        <li><span class="bold">Status: </span>
                            {{ $application->subStatus->name }}</li>
                    </ul>
                </table>
            </td>
            <td style="text-align: justify !important;width:25% !important;margin-right:5% !important;">
                <h3>{{ $application->full_name }} </h3>
                <h3>{{ $application->title->name }} </h3>
            </td>
            <td style="border:none !important;">
                <img src="{{ $photo_src }}" width="200" height="200" style="border: 1px solid black;">
            </td>
        </tr>
    </table>


    <br>

    <h3>Personal Information</h3> <br>
    <table>
        <tr>

            <td><span class="bold">Nationality: </span>
                {{ \App\Models\Nationality::whereId($application->nationality)->first()?->name ?? '' }}
            </td>
            <td><span class="bold">Passport No: </span>
                {{ $application->passport_no }}
            </td>
            <td><span class="bold">Place Of Birth: </span>
                {{ $application->place_of_birth ?? '' }}
            </td>
            <td><span class="bold">Date Of Birth: </span>
                {{ \Carbon\Carbon::parse($application->date_of_birth)->format('Y-M-d') ?? '' }}
            </td>
            <td colspan="2"><span class="bold">Age: </span> {{ $application->age }}</td>

        </tr>


        <tr>
            <td><span class="bold">Issue Date: </span>
                {{ \Carbon\Carbon::parse($application->date_issued)->format('Y-M-d') ?? '' }}
            </td>
            <td><span class="bold">Exp Date: </span>
                {{ \Carbon\Carbon::parse($application->expiry_issued)->format('Y-M-d') ?? '' }}
            </td>
            <td><span class="bold">Issue Place: </span>
                {{ $application->place_issued }}
            </td>

            <td><span class="bold">Address: </span>
                {{ $application->address }}</td>
            <td><span class="bold">Contact No:</span>
                {{ $application->contact_no }}
            </td>
            <td><span class="bold">Relegion: </span>
                {{ $application->relegion }}</td>

        </tr>


        <tr>

            <td><span class="bold">Sex:</span> {{ $application->sex }}</td>

            <td><span class="bold">Children: </span>
                {{ $application->children }}</td>
            <td><span class="bold">Height: </span>
                {{ $application->height }}</td>
            <td colspan="3"><span class="bold">Weight:</span>
                {{ $application->weihgt }}</td>

        </tr>




    </table>


    <br>

    <h3>Level of Language</h3> <br>
    <table>
        <thead>
            <tr>
                <th style="text-align:center !important;" scope="col">Language</th>
                <th style="text-align:center !important;" scope="col">Speak</th>
                <th style="text-align:center !important;" scope="col">Understand</th>
                <th style="text-align:center !important;" scope="col">Read</th>
                <th style="text-align:center !important;" scope="col">Write</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:center !important;">Arabic</td>
                <td style="text-align:center !important;">{{ ucfirst($application->arabic_speak) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->arabic_understand) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->arabic_read) }}</td>
                <td style="text-align:center !important;">{{ $application->arabic_write }}</td>
            </tr>
            <tr>
                <td style="text-align:center !important;">English</td>
                <td style="text-align:center !important;">{{ ucfirst($application->english_speak) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->english_understand) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->english_read) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->english_write) }}</td>
            </tr>
            <tr>
                <td style="text-align:center !important;">Hindi</td>
                <td style="text-align:center !important;">{{ ucfirst($application->hindi_speak) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->hindi_understand) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->hindi_read) }}</td>
                <td style="text-align:center !important;">{{ ucfirst($application->hindi_write) }}</td>
            </tr>
        </tbody>
    </table>
    <br>


    <h3>Education</h3> <br>
    <table>
        <th style="text-align:center !important;"ead>
            <tr>
                <th style="text-align:center !important;">Degree</th>
                <th style="text-align:center !important;">Year</th>
                <th style="text-align:center !important;">Educational Body</th>
                <th style="text-align:center !important;">Country</th>
            </tr>
        </th>

        <tbody>
            @foreach ($application->educations as $edu)
                <tr>
                    <td style="text-align:center !important;">{{ ucfirst($edu->degree) }}</td>
                    <td style="text-align:center !important;">{{ ucfirst($edu->year) }}</td>
                    <td style="text-align:center !important;">{{ ucfirst($edu->collage) }}</td>
                    <td style="text-align:center !important;">{{ ucfirst($edu->country) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>



    <br>

    <h3>Working Experince</h3> <br>
    <table>
        <tr>
            <th style="text-align:center !important;">Employer</th>
            <th style="text-align:center !important;">Duration (Year)</th>
            <th style="text-align:center !important;">Country</th>
            <th style="text-align:center !important;">Designation</th>
        </tr>
        <tr>
            @foreach ($application->employers as $emplyoer)
        <tr>
            <td style="text-align:center !important;">{{ ucfirst($emplyoer->name) }}</td>
            <td style="text-align:center !important;">{{ $emplyoer->duration }}</td>
            <td style="text-align:center !important;">{{ ucfirst($emplyoer->country) }}</td>
            <td style="text-align:center !important;">{{ ucfirst($emplyoer->designation) }}</td>
        </tr>
        @endforeach
        </tr>
        <tr style="text-align:center !important;">
            <td colspan="4" style="text-align:center !important;">
                <span class="bold">Total Experince: </span>
                {{ @$application->employers?->sum('duration') ?? '' }}</td>
        </tr>
    </table>
    <br>
    <table class="tableNoBorder" style="width:100% !important;margin:auto !important;">
        <tr>
            <td style="width:50% !important;" class="text-left"><span class="bold">FOR OFFICAL ONLY</span></td>
            <td style="width:50% !important;" class="text-center"><span class="bold">Minimum Expected
                    Salary:</span> {{ $application->min_salary }}
            </td>
        </tr>
        <tr>
            <td style="width:50% !important;" class="text-left">
                <span class="bold">Applicant Interviewed By: </span>{{ $application->applicant_interviewd_by }}
            </td>
            <td style="width:50% !important;" class="text-center">
                <span class="bold">Recommendations: </span> {{ $application->recommendations }}
            </td>
        </tr>
    </table>
    {{-- <table class="tableNoBorder">

        <tr>
            <td class="text-left"><span class="bold">FOR OFFICAL ONLY</span></td>
            <td class="text-right" style="display:flex; justify-content:center"><span class="bold">Minimum Expected
                    Salary:</span> {{ $application->min_salary }}
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td class="text-left">
                <span class="bold">Applicant Interviewed By: </span>{{ $application->applicant_interviewd_by }}
            </td>
            <td class="text-right" style="display:flex; justify-content:center;padding-right:13% !important;">
                <span class="bold">Recommendations: </span> {{ $application->recommendations }}
            </td>
        </tr>
    </table> --}}
</body>

</html>

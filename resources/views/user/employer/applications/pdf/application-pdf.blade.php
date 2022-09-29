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

        body {
            height: 3508px !important;
            padding: 5px !important;
        }

        .parent {
            /* border: 1px solid black; */
            margin-top: 10px !important;
            padding: 2rem 2rem;
            text-align: center;
        }

        .child {
            display: inline-block;
            border: 1px solid #000;
            padding: 2rem 2rem;
            vertical-align: middle;
            min-height: 100px !important;
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
    <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="10%" style="margin-left:50%;">
    <h3>Application Information</h3>
    <div class="parent" style="margin-top:5%;">
        <div class="child" style="margin-right:40px !important;">
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
        </div>
        <div class="child" style="" class="child" style="margin-left:40px !important;">
            <p style="padding: 3px;">
                Al Shoala Recruitment Service W.L.L
            </p>
            <p style="padding: 3px;">
                DSR: {{ $application->job->post_number }}
            </p>
            <p style="padding: 3px;">
                Creation Date: {{ $application->job->created_at }}
            </p>
            <p style="padding: 3px;">
                &nbsp;
            </p>
        </div>
    </div>
    {{-- <img src="{{$photo_src}}"
        width="200" height="200" style="margin-left:70%;border: 1px solid black;"> --}}
    <br>
    <table style="margin-top: -150px">
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
            <td>Contact No:
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

    <br><br>

    <h3>Education</h3>
    <table>
        <tr>
            <th>Degree</th>
            <th>Educational Body</th>
            <th>Country</th>
            <th>Year</th>
        </tr>
        @foreach ($application->educations as $education)
            <tr>

                <td>{{ $education->degree }}</td>
                <td>{{ $education->from }}</td>
                <td>{{ $education->country }}</td>
                <td>{{ $education->year }}</td>
            </tr>
        @endforeach
    </table>

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
            <td>{{ $application->employers->count('duration') }}</td>
        </tr>
    </table>
    <br><br>
    <table class="tableNoBorder">
        <tr>
            <td>FOR OFFICAL ONLY</td>
            <td>Minimum Expected Salary: {{ $application->min_salary }}</td>
        </tr>
        <tr>
            Applicant Interviewed By: {{ $application->applicant_interviewd_by }}
        </tr>
        <tr>
            Recommendations: {{ $application->recommendations }}
        </tr>
        <tr>
            <td>Signature: </td>
            <td>Date: </td>
        </tr>
    </table>
</body>

</html>

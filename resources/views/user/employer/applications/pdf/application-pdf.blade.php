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
            padding: 1rem 1rem;
            vertical-align: middle;
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
        <div style="background: #f7ff9c" class="child" style="font-weight: 500;">
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
        <div class="child" style="background: #f7ff9c" class="child" style="font-weight: 500;">
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
    @php
        $photo = $application->attachments->where('type', 'Personal Photo')->first()->name;
    @endphp
    <img src="{{ Storage::url('public/uploads/applications' . '/' . $application->id . '/attachments' . '/' . $photo) }}"
        width="200" height="200" style="margin-left:70%;border: 1px solid black;">
    <br>
    <table style="margin-top: -150px">
        <tr>
            <td>Ref: {{ $application->ref }}</td>
            <td>Date: {{ $application->job->created_at }}</td>
        </tr>
        <tr>
            {{ $application->title->name }}
        </tr>
        <tr>
            <td>Full_Name: {{ $application->full_name }}</td>
            <td>Father_Name: {{ $application->father_name }}</td>
        </tr>
        <tr>
            <td>Address: {{ $application->address }}</td>
            <td>Contact_No: {{ $application->contact_no }}</td>
        </tr>
        <tr>
            <td>Passport_No: {{ $application->passport_no }}</td>
            <td>Nationality: {{ $application->Nationlaity ?? 'UNKOWN' }}</td>
        </tr>
        <tr id="tt">
            <td>Place Issued: {{ $application->place_issued }}</td>
            <td>Place Issued: {{ $application->place_of_birth }}</td>
        </tr>
        <tr>
            <td>Date Issued: {{ $application->date_issued }}</td>
            <td>Date Issued: {{ $application->date_of_birth }}</td>
        </tr>
        <tr>
            <td>Expiry Dte: {{ $application->expiry_issued }}</td>
            <td>Age: {{ $application->age }}</td>
            <td>Relegion: {{ $application->relegion }}</td>
        </tr>
        <tr>
            <td>sex: {{ $application->sex }}</td>
            <td>status: {{ $application->status }}</td>
            <td>children: {{ $application->children }}</td>
            <td>height: {{ $application->height }}</td>
            <td>weight: {{ $application->weight }}</td>
        </tr>

    </table>




    <h3>Languages</h3>
    <table>
        <tr>
            <th>Language</th>
            <th>Understand</th>
            <th>Speak</th>
            <th>Write</th>
            <th>Read</th>
        </tr>
        <tr>
            <td>Arabic</td>
            <td>{{ $application->arabic_understand }}</td>
            <td>{{ $application->arabic_speak }}</td>
            <td>{{ $application->arabic_write }}</td>
            <td>{{ $application->arabic_read }}</td>
        </tr>
        <tr>
            <td>English</td>
            <td>{{ $application->english_understand }}</td>
            <td>{{ $application->english_speak }}</td>
            <td>{{ $application->english_write }}</td>
            <td>{{ $application->english_read }}</td>
        </tr>
        <tr>
            <td>Hindi</td>
            <td>{{ $application->hindi_understand }}</td>
            <td>{{ $application->hindi_speak }}</td>
            <td>{{ $application->hindi_write }}</td>
            <td>{{ $application->hindi_read }}</td>
        </tr>

    </table>


    <h3>Education</h3>
    <table>
        <tr>
            <th>Degree</th>
            <th>Edu-Body</th>
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
    <br>
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

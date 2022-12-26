<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            font-size: 9px;
            border-collapse: collapse;
            width: 100% !important;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center !important;
        }


        .parent {
            /* border: 1px solid black; */
            /* width: 100%; */
            text-align: center;
            margin-top: -30px;
            padding: 2rem 2rem;
        }

        .child {
            display: inline-block;
            /* border: 1px solid #000; */
            padding: 1rem 1rem;
            vertical-align: middle;
        }

        ul {
            list-style-type: disc;
            font-size: 9px;
        }

        footer {
            font-size: 9px;

        }

        .titles tr {
            background-color: rgb(37, 138, 171);
            ;
            color: white
        }

        .titles th {
            background-color: red;
            color: white;
        }

        .basicInfo tr td:nth-child(odd) {
            background-color: rgb(37, 138, 171);
            color: white;
        }

        .basicInfo tr td {
            /* padding: 2% !important; */
            width: 50% !important;
        }

        body {
            font-size: 9px;
            height: 5vh;
        }

        .fromDiv {
            width: 100%;
        }

        .fromDiv p {
            display: inline-block;
            margin: 0px 30px;
        }

        tr {
            line-height: 1;
        }

        .text-left {
            text-align: left !important;
        }

        .text-right {
            text-align: right !important;
        }

        .tableNoBorder td {
            border: none !important;
        }

        .with-border {
            border: 1px solid #000 !important;
            font-size: 18px !important;
            text-align: justify !important;
        }

        td .with-left-border {
            border-left: 1px solid #000 !important;
        }

        td.with-right-border {
            border-right: 1px solid #000 !important;
        }

        .bold {
            font-weight: bold !important;
        }
    </style>
</head>

<body>
    {{-- <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="15%" style="margin-left:50%;"> --}}

    <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="35%">
    <div style="width: 100% !important; text-align:center !important;">
        <h1>Demand For Recruitment</h1>
    </div>
    <div class="parent">
        <table class="tableNoBorder" style="margin-bottom:15px !important;">
            <tr>
                <td style="width:50% !important;">
                    <div class="with-border" style="height: 160px !important;">
                        <p style="text-align: center !important;">From</p>
                        <ul>
                            @if (Auth::user()->type == 'Admin')
                                <li>
                                    <span class="bold">{{ $job->user->name }}</span>
                                </li><br>
                                <li class="bold">
                                    Telephone: {{ $job->user->mobile }}
                                </li><br>
                                @if ($job->user->responsible_person)
                                    <li class="bold">
                                        Representative: {{ $job->user->responsible_person }}
                                    </li><br>
                                @endif
                            @elseif(Auth::user()->type == 'Broker')
                                <li class="bold">
                                    Telephone: {{ $job->user->mobile }}
                                </li><br>
                                @if ($job->user->responsible_person)
                                    <li class="bold">
                                        Representative: {{ $job->user->responsible_person }}
                                    </li><br>
                                @endif
                            @endif
                            @if(Auth::user()->type != 'Broker' || Auth::user()->type != 'Admin')
                            <li class="bold"><span class="bold">Al Shoala Recruitment Service W.L.L</span></li>
                            <br>
                            <li><span class="bold">Abdulla Ali Al Shoala</span></li><br>
                            <li><span class="bold">General Manager</span></li><br>
                            @endif
                            <li>
                                <span class="bold">Date:</span>
                                {{ \Carbon\Carbon::parse($job->created_at)->format('Y-M-d') }}
                            </li><br>
                        </ul>
                    </div>
                </td>

                <td style="width:50% !important;">
                    <div class="with-border" style="height: 160px !important;">
                        <p style="text-align: center !important;">To</p>
                        <ul>
                            @if (Auth::user()->type == 'Admin')
                                <li class="bold"><span class="bold">Al Shoala Recruitment Service W.L.L</span>
                                </li>
                                <br>
                                <li><span class="bold">Abdulla Ali Al Shoala</span></li><br>
                                <li><span class="bold">General Manager</span></li><br>
                            @elseif(Auth::user()->type == 'Broker')
                                <li class="bold"> <span class="bold">Al Shoala Recruitment Service W.L.L</span>
                                </li>
                                <br>
                                <li><span class="bold">Abdulla Ali Al Shoala</span></li><br>
                                <li><span class="bold">General Manager</span></li><br>
                            @else
                                <li> <span class="bold"> {{ Auth::user()->name }}</span></li><br>
                                @if ($job->user->responsible_person)
                                    <li><span class="bold"> {{ Auth::user()->responsible_person }}</span></li><br>
                                @endif
                            @endif
                            <li>
                                <span class="bold">DSR:</span> {{ $job->post_number }}
                            </li><br>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>


    <table class="titles" style="margin-top: -15px;" style="width: 100% !important;">
        <tr>
            <th>#</th>
            <th>Job Title</th>
            <th>Quantity</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Nationality</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @forelse ($job->subJobs as $subjob)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $subjob->title->name }}</td>
                <td>{{ $subjob->quantity }}</td>
                <td>{{ $subjob->salary }}</td>
                <td>{{ $subjob->gender }}</td>
                <td>{{ $subjob->age }}</td>
                <td>{{ $subjob->nationality->name }}</td>
                </td>
            </tr>
        @empty
        @endforelse
    </table>

    <br><br>

    <table class="basicInfo" style="font-size: 9px; !important; !important;width: 100% !important;">

        <tr>
            <td>Currency:</td>
            <td>{{ $job->currency }}</td>
            <td>Joining Ticket: </td>
            <td>{{ $job->joining_ticket }}</td>
        </tr>

        <tr>
            <td>Working Days:</td>
            <td>{{ $job->working_days }}</td>
            <td>Return Ticket: </td>
            <td>{{ $job->return_ticket }}</td>
        </tr>

        <tr>
            <td>Off Day:</td>
            <td>{{ $job->off_day }}</td>
            <td>Annual Leave: </td>
            <td>{{ $job->annual_leave }}</td>
        </tr>

        <tr>
            <td>Working Hours:</td>
            <td>{{ $job->working_hours }}</td>
            <td>Medical Insurance: </td>
            <td>{{ $job->medical }}</td>
        </tr>

        <tr>
            <td>Overtime: </td>
            <td>As Per Labour Law</td>
            <td>Transport</td>
            <td>{{ $job->transport }}</td>
        </tr>

        <tr>
            <td>Indemnity: </td>
            <td>As Per Labour Law</td>
            <td>Accommodation: </td>
            <td>{{ $job->accommodation }} @if ($job->accommodation_amount)
                    {{ ' | ' . $job->accommodation_amount }}
                @endif
            </td>
        </tr>

        <tr>
            <td>Food Allowance: </td>
            <td>{{ $job->food }} @if ($job->food_amount)
                    {{ ' | ' . $job->food_amount }}
                @endif
            </td>
            <td>
                Country Entry requirements if any:
            </td>

            <td>
                Employer is liable for any additional fees, imposed by official authorities inside employer country
            </td>
        </tr>

        <tr>
            <td>Contract Period: </td>
            <td>{{ $job->contract_period }}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        {{--  --}}


    </table>
    @isset($job->description)
        <div style="margin-top: 20px; font-weight: 400;">
            <label for="">Job Description:</label>
            <p>{{ $job->description }}</p>
        </div>
    @endisset

    @if (Auth::user()->type == 'Admin')
        <div style="width:50% !important; margin-left:80% !important;">
            On behalf of<br>
            {{ $job->user->name }}<br>
            Signature & Stamp
        </div>
    @elseif(Auth::user()->type == 'Broker')
        <div style="width:50% !important; margin-left:80% !important;">
            On behalf of<br>
            {{ $job->user->name }}<br>
            Signature & Stamp
        </div>
    @endif



    @if ($is_agent)
        @if ($has_terms)
            <div style="border:1px solid black; margin-top:5px; padding:5px;">
                <h3>Supply Terms & Conditions:</h3>
                <table>
                    <tr>
                        <th>Job Title</th>
                        <th>Service_Charge</th>
                        <th>&nbsp;</th>
                    </tr>
                    @foreach ($job->terms->where('user_id', Auth::id()) as $term)
                        <tr>
                            <td>{{ $term->title }}</td>
                            <td>{{ $term->serivce_charge . ' (' . $term->currency . ' )' }}</td>
                            <td>{{ 'Per ' . $term->per }}</td>
                        </tr>
                    @endforeach
                </table>

                <ul style="font-size: 9px;">
                    <li>Agent Confirm the Demand accepted or Rejected within
                        {{ $job->terms->first()->acceptence_duration }} Day</li>
                    <li>Agent Submit the candidate CV's within {{ $job->terms->first()->submission_duration }} Days
                        from
                        receiving the signature of the demand </li>
                    <li> A {{ $job->terms->first()->completion_duration }} day total duration is expected for demand
                        till
                        complete.</li>
                    <li>{{ $job->terms->first()->pay_from }}
                        {{ $job->terms->first()->pay_from == 'Alshoala' ? ' Recruitment Services W. L. L. ' : '' }}
                        will
                        pay to {{ $job->terms->first()->pay_to }}
                        {{ $job->terms->first()->pay_to == 'Alshoala' ? ' Recruitment Services W. L. L. ' : '' }}the
                        Service Charge {{ $job->terms->first()->after_before }} candidate arrival
                        date.
                    </li>
                </ul>

                <table class="tableNoBorder">
                    <tr>
                        <td class="text-left">
                            <p>On behalf Of Al Shoala Recruitment Service W. L. L </p>
                            <p>Abdulla Ali Al Shoala</p>
                            <p>General Manager</p>
                        </td>
                        <td class="">&nbsp;</td>
                        <td class="">&nbsp;</td>
                        <td class="text-left">
                            <p>Agent Accept the demand terms</p>
                            <p>Signature & Stamp</p>
                        </td>
                    </tr>
                </table>
            </div>
        @endif
    @endif

</body>

</html>

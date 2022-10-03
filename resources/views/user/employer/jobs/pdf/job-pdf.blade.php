<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            font-size: 9px;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
            background-color: lightblue;
            color: white
        }

        .titles th {
            background-color: red;
            color: white;
        }

        .basicInfo tr td:nth-child(even) {
            background-color: lightblue;
            color: white
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
    </style>
</head>

<body>
    {{-- <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="15%" style="margin-left:50%;"> --}}

    <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="10%" style="margin-left:50%;">
    <div class="parent">
        <div class="child" s class="child" style="font-weight: 500;min-height:80px !important;">
            <h3>From</h3>
            <p>
                Al Shoala Recruitment Service W.L.L
            </p>
            <p>
                Job No: {{ $job->post_number }}
            </p>
        </div>
        <div class="child" style="font-weight:500;min-height:80px !important;">
            <h3>To</h3>
            @if (Auth::user()->type == 'Admin' || 'Broker')
                <p>
                    {{ $job->user->name }}
                </p>
                <p>
                    {{ $job->user->email }}
                </p>
            @else
                <p>
                    {{ Auth::user()->name }}
                </p>
                <p>
                    {{ Auth::user()->email }}
                </p>
            @endif
            </p>
        </div>

    </div>
    <br>


    <table class="titles" style="margin-top: -15px;">
        <tr>
            <th>Category</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Nationality</th>
        </tr>
        @forelse ($job->subJobs as $subjob)
            <tr>
                <td>{{ $subjob->title->sector->name }}</td>
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

    <table class="basicInfo" style="font-size: 9px;">

        <tr>
            <td>Currency:</td>
            <td>{{ $job->currency }}</td>
        </tr>

        <tr>
            <td>Working Days:</td>
            <td>{{ $job->working_days }}</td>
        </tr>

        <tr>
            <td>Off Day:</td>
            <td>{{ $job->off_day }}</td>
        </tr>

        <tr>
            <td>Working Hours:</td>
            <td>{{ $job->working_hours }}</td>
        </tr>

        <tr>
            <td>Overtime: </td>
            <td>As Per Labour Law</td>
        </tr>

        <tr>
            <td>Indemnity: </td>
            <td>As Per Labour Law</td>
        </tr>

        <tr>
            <td>Food Allowance: </td>
            <td>{{ $job->food }} @if ($job->food_amount)
                    {{ ' | ' . $job->food_amount }}
                @endif
            </td>
        </tr>

        <tr>
            <td>Contract Period: </td>
            <td>{{ $job->contract_period }}</td>
        </tr>

        <tr>
            <td>Joining Ticket: </td>
            <td>{{ $job->joining_ticket }}</td>
        </tr>

        <tr>
            <td>Return Ticket: </td>
            <td>{{ $job->return_ticket }}</td>
        </tr>

        <tr>
            <td>Annual Leave: </td>
            <td>{{ $job->annual_leave }}</td>
        </tr>


        <tr>
            <td>Medical Insurance: </td>
            <td>{{ $job->medical }}</td>
        </tr>

        <tr>
            <td>Transport</td>
            <td>{{ $job->transport }}</td>
        </tr>


        <tr>
            <td>Accommodation: </td>
            <td>{{ $job->accommodation }} @if ($job->accommodation_amount)
                    {{ ' | ' . $job->accommodation_amount }}
                @endif
            </td>
        </tr>


        <tr>
            <td>
                Country Entry requirements if any:
            </td>

            <td>
                Employer is liable for any additional fees, imposed by official authorities inside employer country
            </td>

        </tr>

    </table>
    @isset($job->description)
        <div style="margin-top: 20px; font-weight: 400;">
            <label for="">Description:</label>
            <p>{{ $job->description }}</p>
        </div>
    @endisset


    @if ($is_agent)
        @if ($has_terms)
            <div style="border:1px solid black; margin-top:5px; padding:5px;">
                <h3>Supply Terms & Conditions:</h3>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Service_Charge</th>
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
                            <td class="text-left"> <p>On behalf Of Al Shoala Recruitment Service W. L. L </p>  <p>Abdulla Ali Al Shoala</p> <p>General Manager</p> </td>
                            <td class="">&nbsp;</td>
                            <td class="">&nbsp;</td>
                            <td class="text-left"><p>Agent Accept the demand terms</p>
                            <p>Signature & Stamp</p></td>
                        </tr>
                    </table>
            </div>
        @endif
    @endif

</body>

</html>

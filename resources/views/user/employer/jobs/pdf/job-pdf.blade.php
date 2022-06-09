<!DOCTYPE html>
<html>

<head>
    <style>
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

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .parent {
            /* border: 1px solid black; */
            margin: 1rem;
            padding: 2rem 2rem;
            text-align: center;
        }

        .child {
            display: inline-block;
            border: 1px solid #000;
            padding: 1rem 1rem;
            vertical-align: middle;
        }

        ul {
            list-style-type: disc;
            font-size: 0.8rem;
        }

        footer {
            font-size: 0.8rem;

        }
    </style>
</head>

<body>
    <h3>Demand for Recruitment</h3>
    <div class='parent'>
        <div class='child'>
            <p>
                Clinet Name: {{ $job->user->name }}
            </p>
            <p>
                Telephone: {{ $job->user->mobile }}
            </p>
            <p>
                E-mail: {{ $job->user->email }}
            </p>
        </div>
        <div class='child'>
            <p> Al Shoala Recruitment Service W.L.L</p>
            <p> Job No: {{ $job->post_number }}</p>
            <p>&nbsp;&nbsp;&nbsp;</p>
        </div>
    </div>
    <br>

    {{-- <table>
        <tr>
            <th>Demand SR</th>
            <th>Category</th>
            <th> Title</th>
            <th> Quantity</th>
            <th> Salary</th>
            <th>currency</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>{{ $job->post_number }}</td>
            <td>{{ $job->subJobs->first()->title->sector->name }}</td>
            <td>{{ $job->subJobs->first()->title->name }}</td>
            <td>{{ $job->quantity }}</td>
            <td>{{ $job->salary }}</td>
            <td>{{ $job->currency }}</td>
            <td>{{ $job->created_at }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <th>Contract Period</th>
            <th>working_hours</th>
            <th>Working Days</th>
            <th>Accommodation</th>
            <th>accommodation_amount</th>
        </tr>
        <tr>
            <td>{{ $job->status }}</td>
            <td>{{ $job->subJobs()->first()->nationality->name }}</td>
            <td>{{ $job->contract_period }}</td>
            <td>{{ $job->working_hours }}</td>
            <td>{{ $job->working_days }}</td>
            <td>{{ $job->accommodation }}</td>
            <td>{{ $job->accommodation_amount }}</td>
        </tr>

        <tr>
            <th>medical</th>
            <th>insurance</th>
            <th>food</th>
            <th>food_amount</th>
            <th>Transport</th>
            <th>off_day</th>
            <th>indemnity_leave_and_overtime_salary</th>
        </tr>
        <tr>
            <td>{{ $job->medical }}</td>
            <td>{{ $job->insurance }}</td>
            <td>{{ $job->food }}</td>
            <td>{{ $job->transport }}</td>
            <td>{{ $job->annual_leave }}</td>
            <td>{{ $job->off_day }}</td>
            <td>{{ $job->indemnity_leave_and_overtime_salary }}</td>
        </tr>

        <tr>
            <th>age</th>
            <th>age_limit</th>
            <th>sex</th>
            <th>requested_by</th>
            <th>joining_ticket</th>
            <th>return_ticket</th>
            <th>covid_test</th>
        </tr>
        <tr>
            <td>{{ $job->age }}</td>
            <td>{{ $job->age_limit }}</td>
            <td>{{ $job->sex }}</td>
            <td>{{ $job->requested_by }}</td>
            <td>{{ $job->joining_ticket }}</td>
            <td>{{ $job->return_ticket }}</td>
            <td>{{ $job->covid_test }}</td>
        </tr>
    </table> --}}

    <table>
        <tr>
            <th>Title</th>
            <th>Salary</th>
            <th>Quantity</th>
            <th>Nationality</th>
            <th>Descreption</th>
        </tr>
        @forelse ($job->subJobs as $subjob)
            <tr>
                <td>{{ $subjob->title->name }}</td>
                <td>{{ $subjob->salary }}</td>
                <td>{{ $subjob->quantity }}</td>
                <td>{{ $subjob->nationality->name }}</td>
                <td>{{ $subjob->description ?? 'as per attachment' }}
                </td>
            </tr>
        @empty
        @endforelse
    </table>

    <br><br>

    <table>
        <tr>
            <td>Contract Period: </td>
            <td>{{ $job->contract_period }}</td>
        </tr>
        <tr>
            <td>Duty:</td>
            <td>{{ $job->working_hours . ' | ' . $job->working_days . ' Days Per Week' }}</td>
        </tr>

        <tr>
            <td>Accommodation: </td>
            <td>{{ $job->accommodation }} @if ($job->accommodation_amount)
                    {{ ' | ' . $job->accommodation_amount }}
                @endif
            </td>
        </tr>


        <tr>
            <td>Transport</td>
            <td>{{ $job->transport }}</td>
        </tr>
        <tr>
            <td>Insurance: </td>
            <td>{{ $job->insurance }}</td>
        </tr>

        <tr>
            <td>Medical: </td>
            <td>{{ $job->medical }}</td>
        </tr>

        <tr>
            <td>Joining Ticket: </td>
            <td>{{ $job->joining_ticket }}</td>
        </tr>

        <tr>
            <td>Overtime: </td>
            <td>{{ $job->indemnity_leave_and_overtime_salary }}}</td>
        </tr>

        <tr>
            <td>Quarantine Expenses (Bahrain): </td>
            <td>Company will pay</td>
        </tr>

        <tr>
            <td>Swab Test (Covid-19 Bahrain): </td>
            <td>Company will pay</td>
        </tr>

        <tr>
            All Other Terms & Conditions are as per Bahrain Labour Law.
        </tr>

    </table>

    <h3>Supply Terms & Conditions:</h3>
    <table>

    </table>
    <ul>
        <li>Agent Confirm the Demand accepted or Rejected within 1 Day</li>
        <li>Agent Submit the candidate CV's within 5 Days from receiving the signature of the demand </li>
        <li> A 45 day total duration is expected for demand till complete.</li>
        <li>Alshoala Recruitment Services W. L. L. will pay to Agent the Service Charge after candidate arrival date.
        </li>
    </ul>

    <footer>
        <p> On behalf Of Al Shoala Recruitment Service W. L. L </p>
        <div class="parent">
            <div class="child">
                <p> Abdulla Ali Al Shoala</p>
                <p>General Manager</p>
            </div>
            <div class="child">
                <p>Agent Accept the demand terms</p>
                <p>Signature & Stamp</p>
            </div>
        </div>
    </footer>
</body>

</html>

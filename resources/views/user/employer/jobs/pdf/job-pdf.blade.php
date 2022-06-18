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
            font-size: 9px;
        }

        footer {
            font-size: 9px;

        }

        .titles tr {
            background-color: #00B074;
        }

        .titles th {
            background-color: #d8e8a7;
        }

        .basicInfo tr td:nth-child(even) {
            background-color: #00B074;
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
        tr
        {
            line-height: 1;
        }
    </style>
</head>

<body>
    <h3>Demand for Recruitment</h3>
    <div style="background: #f7ff9c" class="fromDiv">
        <p>
            From: {{ $job->user->name }}
        </p>
        <p>
            E-mail: {{ $job->user->email }}
        </p>
        <p>
            Mobile: {{ $job->user->mobile }}
        </p>
    </div>
    <br>


    <table class="titles">
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
            <td>Working Days:</td>
            <td>{{ $job->working_days }}</td>
        </tr>

        <tr>
            <td>Off Day:</td>
            <td>{{ $job->off_Day }}</td>
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


    <div style="border:1px solid black; margin-top:5px; padding:5px;">
        <h3>Supply Terms & Conditions:</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Service_Charge</th>
            </tr>
            @foreach ($job->terms->where('user_id' , Auth::id()) as $term)
                <tr>
                    <td>{{ $term->title }}</td>
                    <td>{{ $term->serivce_charge . ' (' . $term->currency . ' )' }}</td>
                    <td>{{ 'Per ' . $term->per }}</td>
                </tr>
            @endforeach
        </table>

        <ul style="font-size: 9px;">
            <li>Agent Confirm the Demand accepted or Rejected within 1 Day</li>
            <li>Agent Submit the candidate CV's within 5 Days from receiving the signature of the demand </li>
            <li> A 45 day total duration is expected for demand till complete.</li>
            <li>Alshoala Recruitment Services W. L. L. will pay to Agent the Service Charge after candidate arrival
                date.
            </li>
        </ul>

        <footer style="font-size: 9px;">
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
    </div>

</body>

</html>

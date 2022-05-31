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

    </style>
</head>

<body>

    <h3>Demand Information</h3>

    <table>
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
            <td>{{ $job->title->sector->name }}</td>
            <td>{{ $job->title->name }}</td>
            <td>{{ $job->quantity }}</td>
            <td>{{ $job->salary }}</td>
            <td>{{ $job->currency }}</td>
            <td>{{ $job->created_at }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <th>natoinality</th>
            <th>Contract Period</th>
            <th>working_hours</th>
            <th>Working Days</th>
            <th>Accommodation</th>
            <th>accommodation_amount</th>
        </tr>
        <tr>
            <td>{{ $job->status }}</td>
            <td>{{ $job->nationality->name }}</td>
            <td>{{ $job->contract_period}}</td>
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
            <td>{{ $job->food}}</td>
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
            <td>{{ $job->requested_by}}</td>
            <td>{{ $job->joining_ticket}}</td>
            <td>{{ $job->return_ticket }}</td>
            <td>{{ $job->covid_test }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Desccreption</th>
        </tr>
        <tr>
            <th>{{$job->description}}</th>
        </tr>
    </table>

    <table>
        <tr>
            <th>Other Terms</th>
        </tr>
        <tr>
            <th>{{$job->other_terms}}</th>
        </tr>
    </table>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            font-size:10px;
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

    <h2>Demand Information</h2>

    <table>
        <tr>
            <th>Demand SR</th>
            <th>Demand Category</th>
            <th> Title</th>
            <th> Quantity</th>
            <th> Salary</th>
            <th>status</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>{{ $application->job->post_number }}</td>
            <td>{{ $application->job->title->sector->name }}</td>
            <td>{{ $application->job->title->name }}</td>
            <td>{{ $application->job->quantity }}</td>
            <td>{{ $application->job->salary }}</td>
            <td>{{ $application->job->status }}</td>
            <td>{{ $application->job->created_at }}</td>
        </tr>
    </table>

    <h2>Application Information</h2>

    <table>
        <tr>
            <th>Full_Name:</th>
            <th>Ref</th>
            <th>Address</th>
            <th>Passport_No</th>
            <th>Contact_No</th>
            <th>Age</th>
        </tr>
        <tr>
            <td>{{ $application->full_name }}</td>
            <td>{{ $application->ref }}</td>
            <td>{{ $application->address }}</td>
            <td>{{ $application->passport_no }}</td>
            <td>{{ $application->contact_no }}</td>
            <td>{{ $application->age }}</td>
        </tr>
        <tr>
            <th>Relegion</th>
            <th>Date_Issued</th>
            <th>Place_Issued</th>
            <th>Place_Of_Birth</th>
            <th>Date_Of_Birth</th>
            <th>Expiry_Issued</th>
        </tr>
        <tr>
            <td>{{ $application->relegion }}</td>
            <td>{{ $application->date_issued }}</td>
            <td>{{ $application->place_issued }}</td>
            <td>{{ $application->place_of_birth }}</td>
            <td>{{ $application->date_of_birth }}</td>
            <td>{{ $application->expiry_issued }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <th>sex</th>
            <th>Children</th>
            <th>height</th>
            <th>weight</th>
            <th>Min_Salary</th>
        </tr>
        <tr>
            <td>{{ $application->date }}</td>
            <td>{{ $application->sex }}</td>
            <td>{{ $application->height }}</td>
            <td>{{ $application->weight }}</td>
            <td>{{ $application->sex }}</td>
            <td>{{ $application->min_salary }}</td>
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
</body>

</html>

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
    <!-- Favicon -->
    <link href="{{ asset('assets/dist_1/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/dist_1/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist_1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/dist_1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/dist_1/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>Demand for Recruitment</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <h6>
                    DSR: {{ $job->post_number }} <br>
                    Date: {{ $job->created_at }}
                </h6>
            </div>
        </div>
    </div>
    
{{--
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
    </table>

    <table>
        <tr>
            <th>Desccreption</th>
        </tr>
        <tr>
            <th>{{ $job->description }}</th>
        </tr>
    </table>

    <table>
        <tr>
            <th>Other Terms</th>
        </tr>
        <tr>
            <th>{{ $job->other_terms }}</th>
        </tr> --}}
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

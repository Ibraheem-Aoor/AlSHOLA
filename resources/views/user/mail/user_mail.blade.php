<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALSHOALA | Recruitment Services</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/dist_1/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .card-header {
            font-size: 15px !important;
            font-weight: 600 !important;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        {{$data['subject']}}
    </div>
    <div class="card-body">
        {{$data['message']}}
    </div>
</div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

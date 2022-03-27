<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BSCCL | Billing Software</title>
    <link rel="stylesheet" href="assets/plugins/animate/animate.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .user-name {
            font-size: 20px;
        }

        .fa-spin {
            font-size: 30px;
            margin-top: 50% !important;
            margin-left: 46%;
        }

        .card .overlay,
        .info-box .overlay,
        .overlay-wrapper .overlay,
        .small-box .overlay {
            background-color: rgba(221, 221, 221, .7) !important;
            display: none !important;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            padding: 0.15rem 0.2rem !important;
            font-size: 0. !important;
            line-height: 1 !important;
            border-radius: 0.2rem !important;
        }

        .action-btn-font {
            font-size: 12px !important;
        }

        .table td,
        .table th {
            padding: 5px !important;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <app-component></app-component>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

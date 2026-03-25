<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--SELECT2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        .navbar {
            background-color: #1f2d3d;
            padding: 0.75rem 1.25rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .navbar-brand i {
            margin-right: 10px;
            color: #ffc107; /* highlight icon */
        }

        .navbar-brand:hover {
            color: #dddddd;
        }

        .container {
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <i class="fas fa-clipboard-list"></i> Billing Resep RSKM
        </a>
    </nav>

    <div class="container mt-4">

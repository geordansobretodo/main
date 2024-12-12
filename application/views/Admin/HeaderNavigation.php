
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/admin2.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin_dashboard.css'); ?>">
    <link rel="icon" href="<?= base_url('assets/img/sdcafafa.jpg'); ?>">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: black;
        }

        .metric-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .date-filter-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .date-filter-form label {
            display: block;
            margin-bottom: 5px;
        }

        .date-filter-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .date-filter-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .chart-container {
            margin-top: 20px;
            max-width: 600px;
            margin: 20px auto;
        }

        .table-filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .date-filter-form {
            max-width: 200px;
            margin-left: auto;
        }

        .date-filter-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .date-filter-form button {
            display: block;
            width: 100%;
            padding: 7px;
            background-color: #CD0B0B;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination .page-item.disabled .page-link {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stock Management</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            /*background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);*/
            background-color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        h1 {
            font-size: 30px;
            color: grey;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 14px;
            color: black;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 13px;
            color: grey;
            border-bottom: solid 1px lightgrey;
        }

        section {
            margin: 50px;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px lightgrey;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px lightgrey;
        }

        .button-grey {
            background-color: #e7e7e7;
            color: black;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            min-width: 150px;
        }
    </style>
</head>
<body>
<section>
    <h1>Products</h1>
    <a href="/products/add" class="button-grey pull-right">Add Product</a>

    <div>
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <tr>
                <td>LOLO</td>
                <td>LOLO</td>
                <td>$1.38</td>
                <td></td>
            </tr>
            <tr>
                <td>LOLO</td>
                <td>LOLO</td>
                <td>$2.38</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
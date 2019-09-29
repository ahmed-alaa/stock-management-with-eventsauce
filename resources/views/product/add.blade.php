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

        section {
            margin: 50px;
        }
    </style>
</head>
<body>
<section>
    <h1>Products</h1>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Add Product</a>
                </h4>
            </div>
            <form method="post" action="/products/add">
                {{csrf_field()}}
                <div id="collapse1" class="panel-collapse" style="padding: 10px;">
                    <form>
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="product_code" id="code" placeholder="Product Code" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="product_name" id="name" placeholder="Product Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="/products">Cancel</a>
                    </form>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>
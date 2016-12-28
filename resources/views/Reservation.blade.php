<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
    <form method="post" action="/save">
        <div class="form-group">
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reservation</button>
        </div>

    </form>
</body>
</html>


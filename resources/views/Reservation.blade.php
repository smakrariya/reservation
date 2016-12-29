<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
    <form onsubmit="reservationBooking();" style="max-width: 500px; margin-top: 15px;">
        <div class="form-group col-sm-12"  >
            <input id="seatsNo" name="seatsNo" type="number" min="1" max="7" class="form-control" required>
        </div>

        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary pull-right" >Reservation</button>
        </div>

    </form>
    <script>
        function reservationBooking() {
            $.ajax({
                type:'get',
                url:'/save?seatsNo='+$('#seatsNo').val(),
                success: function (data) {
                    document.write(data);
                    data=JSON.parse(data);
                    for (var i = 0; i <= 11; i++ ){

                    }
                }
            })
        }
    </script>
</body>
</html>


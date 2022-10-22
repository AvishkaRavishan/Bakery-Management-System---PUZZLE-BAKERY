
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Review</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            width: 100%;
        }

        /* Float four columns side by side */
        .column {
            float: right;
            width: 85%;
            padding: 0 10px;
            margin-top: 30px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #F1CA8A;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>View all image</h3>
        <hr>
        <div class="row">
        @foreach($imageData as $data)
            <div class="column">
                <div class="card">
                <img src="{{ url('public/Image/'.$data->image) }}"
 style="height: 100px; width: 150px;">

                    <h2>{{$data->customerName}}</h2>
                    <h3>{{$data->complaint}}</h3>
                   
                </div>
            </div>
            @endforeach
        </div>

    </div>
 
</body>

</html>

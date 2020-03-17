<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wager</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                color: #C82233;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                color: #636b6f;
                color: #FFC106;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <form method="post" action="buy" name="formBuy">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Buy Wager
                    </div>
                    <div class="links">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="Page" aria-describedby="basic-addon1" id="txtID" name="txtID"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Price</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="Limit" aria-describedby="basic-addon1" id="txtPrice" name="txtPrice"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <button type="button" class="btn btn-danger" id="btnSubmit" name="btnSubmit">Submit</button>
                                <button type="button" class="btn btn-danger" id="btnBack" name="btnBack">Home</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $("#btnBack").click(function(){
                window.location = "./";
            });
            $("#btnSubmit").click(function(){
                var id = document.getElementById("txtID").value;
                if (id == "NaN" || id < 0 || id =="") id = 1;
                var price = document.getElementById("txtPrice").value;
                if (price == "NaN" || price < 0 || price =="") price = 10;
                document.formBuy.action = "buy/" + id;
                document.formBuy.submit();
            });
        </script>
    </body>
</html>

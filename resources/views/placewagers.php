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
        <form method="post" action="wagers" name="formSell">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Place Wager
                    </div>
                    <div class="links">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Total Wager Value</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="total_wager_value" aria-describedby="basic-addon1" id="txtTotal_wager_value" name="txtTotal_wager_value"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Odds</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="odds" aria-describedby="basic-addon1" id="txtOdds" name="txtOdds"/>
                                </div>
                            </div>
                            </div>
                            <br>
                             <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Selling Percentage</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="selling_percentage" aria-describedby="basic-addon1" id="txtSelling_percentage" name="txtSelling_percentage"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Selling Price</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="selling_price" aria-describedby="basic-addon1" id="txtSelling_price" name="txtSelling_price"/>
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
                var total_wager_value = document.getElementById("txtTotal_wager_value").value;
                if (total_wager_value == "NaN" || total_wager_value < 0 || total_wager_value =="") total_wager_value = 0;
                var odds = document.getElementById("txtOdds").value;
                if (odds == "NaN" || odds < 0 || odds =="") odds = 0;
                var selling_percentage = document.getElementById("txtSelling_percentage").value;
                if (selling_percentage == "NaN" || selling_percentage < 0 || selling_percentage =="") selling_percentage = 0;
                var selling_price = document.getElementById("txtSelling_price").value;
                if (selling_price == "NaN" || selling_price < 0 || selling_price =="") selling_price = 0;
                if (total_wager_value > 0 && odds > 0 && selling_percentage>0 && selling_percentage < 100 && selling_price > (total_wager_value * (selling_percentage / 100)))
                    document.formSell.submit();
                else
                    alert("Please check your data.");
            });
        </script>
    </body>
</html>

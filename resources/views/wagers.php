<?php
function _build_http_header_string($status_code)
{
    $status = array(
        200 => 'OK',
        201 => 'Insert done',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error',
    );
    return "HTTP/1.1 " . $status_code . " " . $status[$status_code];
}

function http_error($error_code)
{
    $error = array(
        'error' => 'ERROR_DESCRIPTION',
    );
    return $error;
}

if (isset($_POST["txtTotal_wager_value"]) && $_POST["txtOdds"] > 0 && $_POST["txtSelling_percentage"] > 0 && $_POST["txtSelling_price"] > 0) {

    $total_wager_value = $_POST["txtTotal_wager_value"];
    $odds = $_POST["txtOdds"];
    $selling_percentage = $_POST["txtSelling_percentage"];
    $selling_price = $_POST["txtSelling_price"];

    DB::table('wager')
        ->insert(array('total_wager_value' => $total_wager_value, 'odds' => $odds, 'selling_percentage' => $selling_percentage, 'selling_price' => $selling_price, 'current_selling_price' => $selling_price));

    $wagers = DB::select('select * from wager', array(1));
    header(_build_http_header_string(200));
    header("Content-Type: application/json");
    echo json_encode($wagers);

} else {
    header(_build_http_header_string(500));
    header("Content-Type: application/json");
    echo json_encode(http_error('error'));
}

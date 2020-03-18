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

if (isset($_POST["txtPrice"]) && $_POST["txtPrice"] > 0) {
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (preg_match("/\/(\d+)$/", $url, $matches)) {
        $end_url_parameter = $matches[1];
    } else {
        die("Wrong URL.");
    }

    $wager_id = $end_url_parameter;
    $price = $_POST["txtPrice"];

    $selected_wager = DB::table('wager')->where('id', $wager_id)->first();
    if ($selected_wager) {
        if ($selected_wager->current_selling_price >= $price) {
            DB::table('wager_buying')->insert(
                array('wager_id' => $wager_id, 'buying_price' => $price)
            );

            DB::table('wager')
                ->where('id', $wager_id)
                ->update(array('current_selling_price' => $price, 'percentage_sold' => $price / $selected_wager->selling_price, 'amount_sold' => $price));

            $wagers = DB::select('select * from wager_buying order by id desc limit 0,1 ', array(1));
            header(_build_http_header_string(201));
            header("Content-Type: application/json");
            echo json_encode($wagers);

        } else {
            header(_build_http_header_string(500));
            header("Content-Type: application/json");
            echo json_encode(http_error('error'));

        }

    } else {
        header(_build_http_header_string(500));
        header("Content-Type: application/json");
        echo json_encode(http_error('error'));

    }
} else {
    header(_build_http_header_string(500));
    header("Content-Type: application/json");
    echo json_encode(http_error('error'));
}

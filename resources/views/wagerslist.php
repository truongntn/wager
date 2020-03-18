<?php

function _build_http_header_string($status_code)
{
    $status = array(
        200 => 'OK',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error',
    );
    return "HTTP/1.1 " . $status_code . " " . $status[$status_code];
}

$page = $_GET["page"];
$limit = $_GET["limit"];

$wagers = DB::select('select * from wager limit ' . $page . ',' . $limit, array(1));
header(_build_http_header_string(200));
header("Content-Type: application/json");
echo json_encode($wagers);

<?php
namespace App\CustomClass;

class restful_api
{
    /**
     * Property: $method
     * Method, GET POST PUT or DELETE
     */
    protected $method = '';
    /**
     * Property: $endpoint
     * Endpoint of api
     */
    protected $endpoint = '';
    /**
     * Property: $params
     * Parameters of  endpoint, ex: /<endpoint>/<param1>/<param2>
     */
    protected $params = array();
    /**
     * Property: $file
     * Save file of PUT request
     */
    protected $file = null;

    /**
     * Function: __construct
     * Just a constructor
     */
    public function __construct()
    {
        $this->_input();
        $this->_process_api();
    }

    /**
     * Allow CORS
     * Get info of request: endpoint, params and method
     */
    private function _input()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");

        $pi = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '');
        $this->params = explode('/', trim($pi, '/'));
        $this->endpoint = array_shift($this->params);

        $method = $_SERVER['REQUEST_METHOD'];
        $allow_method = array('GET', 'POST', 'PUT', 'DELETE');

        if (in_array($method, $allow_method)) {
            $this->method = $method;
        }

        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;
                break;

            case 'GET':
                break;

            case 'PUT':
                $this->file = file_get_contents("php://input");
                break;

            case 'DELETE':
                break;

            default:
                $this->response(500, "Invalid Method");
                break;
        }
    }

    /**
     * Handle request
     */
    private function _process_api()
    {
        if (method_exists($this, $this->endpoint)) {
            $this->{$this->endpoint}();
        } else {
            $this->response(500, "Unknown endpoint");
        }
    }

    /**
     * Response to client
     * @param: $status_code: http code
     * @param: $data: data response
     */
    protected function response($status_code, $data = null)
    {
        header($this->_build_http_header_string($status_code));
        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    /**
     * http header
     * @param: $status_code: http code
     * @return: http header, ex: HTTP/1.1 404 Not Found
     */
    private function _build_http_header_string($status_code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return "HTTP/1.1 " . $status_code . " " . $status[$status_code];
    }
}

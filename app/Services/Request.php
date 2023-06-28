<?php
namespace App\Services;

class Request
{
    private $requestData;

    public function __construct()
    {
        $this->requestData = $_REQUEST;
    }

    public function __get($key)
    {
        return isset($this->requestData[$key]) ? $this->requestData[$key] : null;
    }

    public function all()
    {
        return $this->requestData;
    }
}

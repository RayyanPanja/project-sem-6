<?php


class Request
{
    private $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public static function Exists($key)
    {
        return !empty($_REQUEST[$key]);
    }

    public function print_Request()
    {
        Helper::pa($_REQUEST, true);
    }
    public function get($key)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return null; // or throw an exception, depending on your use case
    }
    public function all()
    {
        return $this->request;
    }
    public function isEmpty($key)
    {
        return empty($_REQUEST[$key]);
    }
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

<?php

class CustomRequest
{
    private $getArr;
    private $postArr;
    private $cookies;
    private $session;

    public function __construct()
    {
        $this->getArr = $_GET;
        $this->postArr = $_POST;
        $this->cookies = $_COOKIE;
        if(!empty($_SESSION)) {
            $this->session = $_SESSION;
        }
    }

    public function query($key, $default = null)
    {
        return empty($this->getArr[$key]) ? $default:$this->getArr[$key];
    }

    public function post($key, $default = null)
    {
        return empty($this->postArr[$key]) ? $default:$this->postArr[$key];
    }

    public function get($key, $default = null)
    {
        return empty($this->postArr[$key]) ?
            (empty($this->getArr[$key]) ? $default: $this->getArr[$key])
            :$this->postArr[$key];
    }

    public function all(array $only = [])
    {
        return !empty($only) ? array_keys($only) : array_merge($this->getArr,$this->postArr);
    }

    public function has($key)
    {
        if(empty($this->getArr[$key]) &&
            empty($this->postArr[$key])){
            return false;
        }
        return true;
    }

    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function userAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public function cookies()
    {
        return $this->cookies;
    }

    public function session()
    {
        return $this->session;
    }
}
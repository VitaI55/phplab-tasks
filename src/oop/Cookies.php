<?php

class Cookies
{
    private $cookies;

    public function __construct()
    {
        $this->cookies = $_COOKIE;
    }

    public function all(array $only = [])
    {
        return empty($only) ? $this->cookies: array_keys($only);
    }

    public function get($key, $default = null)
    {
        return empty($this->cookies[$key]) ? $default : $this->cookies[$key];
    }

    public function set($key, $value)
    {
        $this->cookies[$key] = $value;
        return "The key {$key} - was set";
    }

    public function has($key)
    {
        if (empty($this->cookies[$key])) {
            return false;
        }
        return true;
    }

    public function remove($key)
    {
        unset($this->cookies[$key]);
        return "The key {$key} - was removed";
    }
}
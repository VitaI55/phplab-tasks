<?php

class Session
{
    private $session;

    public function __construct()
    {
        if(!empty($_SESSION)) {
            $this->session = $_SESSION;
        }
    }

    public function all(array $only = [])
    {
        return empty($only) ? $this->session : array_keys($only);
    }

    public function get($key, $default = null)
    {
        return empty($this->session[$key]) ? $default : $this->session[$key];
    }

    public function set($key, $value)
    {
        $this->session[$key] = $value;
        return "The key {$key} - was set";
    }

    public function has($key)
    {
        if (empty($this->session[$key])) {
            return false;
        }
        return true;
    }

    public function remove($key)
    {
        unset($this->session[$key]);
        return "The session key '{$key}' was removed";
    }

    public function clear()
    {
        unset($this->session);
        return "The session was removed";
    }
}
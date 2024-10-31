<?php

class Session
{
    public $user = 'user';

    public function getUser(): Mixed
    {
        return isset($_SESSION[$this->user]) ? $_SESSION[$this->user] : null;
    }

    public function getUserName(): String
    {
        return $_SESSION[$this->user]['full_name'];
    }

}

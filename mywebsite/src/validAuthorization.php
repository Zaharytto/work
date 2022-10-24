<?php
session_start();

function validAuthorization ()
{
    return $_SESSION['authorization'] = !empty($_SESSION['login']);
}

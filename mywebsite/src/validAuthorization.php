<?php
session_start();

function validAuthorization ()
{
    if (!empty($_SESSION['login'])) {
        return $_SESSION['authorization'] = true;
    } else {
        return $_SESSION['authorization'] = false;
    }
}

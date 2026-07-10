<?php

function conn() {
    $dsn = 'mysql:dbname=alucar;host=127.0.0.1';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}   
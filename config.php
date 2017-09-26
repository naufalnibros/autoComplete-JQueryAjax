<?php

$kon = mysqli_connect('localhost', 'root', '', 'autocomplete_jqueryajax');

if (!$kon) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

<?php
function pesan_sukses($msg) {
    echo "<p style 'color = 'green'>";
    echo $msg;
    echo "</p>";
}

function pesan_gagal($msg) {
    echo "<p style 'color = 'red'>";
    echo $msg;
    echo "</p>";
}
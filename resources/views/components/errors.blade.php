<?php
$message = Session::get('message');
if ($message) {
    echo '<p class="alert alert-success justify-content-center text-center">' . $message . '</p>';
    Session::put('message', null);
}

$message_err = Session::get('message_err');
if ($message_err) {
    echo '<p class="alert alert-danger justify-content-center text-center">' . $message_err . '</p>';
    Session::put('message_err', null);
}

?>

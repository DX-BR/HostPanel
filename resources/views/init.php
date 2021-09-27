<?php

require BASE_URL . DS . "vendor" . DS . "autoload.php";

function clearMessages() {
    $_SESSION['error_message'] = null;
    $_SESSION['success_message'] = null;
}
function setE($message) {
    $_SESSION['error_message'] = $message;
}
function setS($message) {
    $_SESSION['success_message'] = $message;
}

<?php
class Utility {
    public static function setFlash($message, $type = 'success') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function showFlash() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $class = ($flash['type'] === 'success') ? 'flash-success' : 'flash-error';
            echo "<div class='{$class}'>{$flash['message']}</div>";
            unset($_SESSION['flash']);
        }
    }
}

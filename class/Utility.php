
<?php
class Utility {
    public static function redirect($url, $msg = '', $prefill = []) {
        if (!empty($prefill)) {
            $_SESSION['prefill'] = $prefill;
        }
        if ($msg) {
            $_SESSION['flash']['message'] = $msg;
        }
        header("Location: " . BASE_URL . $url);
        exit();
    }

    public static function showFlash() {
        if (isset($_SESSION['flash'])) {
            echo '<p class="flash-message">' . $_SESSION['flash']['message'] . '</p>';
            unset($_SESSION['flash']);
        }
    }

    public static function getPrefill($keys = []) {
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $_SESSION['prefill'][$key] ?? '';
        }
        return $data;
    }

    public static function clearPrefill() {
        if (isset($_SESSION['prefill'])) {
            unset($_SESSION['prefill']);
        }
    }
}
?>

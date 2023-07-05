<?php
namespace App\Services;


class Alert
{
    public static function success($message)
    {
        self::setFlash('success', $message);
    }

    public static function danger($message)
    {
        self::setFlash('error', $message);
    }

    public static function error($message)
    {
        self::setFlash('error', $message);
    }

    public static function warning($message)
    {
        self::setFlash('warning', $message);
    }

    public static function info($message)
    {
        self::setFlash('info', $message);
    }

    private static function setFlash($type, $message)
    {
        // Store the type and message in the session data
        $_SESSION['alert_type'] = $type;
        $_SESSION['alert_message'] = $message;
    }

    public static function display()
    {
        // Check if an alert exists in the session
        if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
            $type = $_SESSION['alert_type'];
            $message = $_SESSION['alert_message'];

            // Display the toast notification using SweetAlert
            echo "<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: '{$type}',
                    title: '{$message}'
                });
            </script>";

            // Clear the alert from the session
            unset($_SESSION['alert_type']);
            unset($_SESSION['alert_message']);
        }
    }
}

<?php
session_start();

$link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());
if (isset($_POST['booking_id'])) {
    $booking_id = $_REQUEST['booking_id'];
    $username = $_REQUEST['username'];

    // บันทึกค่า username ไว้ใน session
    $_SESSION['username'] = $username;

    // Delete bookingdetail first
    $sql_delete_detail = "DELETE FROM bookingdetail WHERE booking_id = '$booking_id'";
    $result_delete_detail = mysqli_query($link, $sql_delete_detail);

    if ($result_delete_detail) {
        // Delete booking
        $sql_delete_booking = "DELETE FROM bookings WHERE booking_id = '$booking_id'";
        $result_delete_booking = mysqli_query($link, $sql_delete_booking);

        if ($result_delete_booking) {
            echo "<script>alert('ลบการจองเรียบร้อยแล้ว');</script>";
            // Redirect ไปยังหน้า listbookingroom.php
            echo "<script>window.location='listbookingroom.php?username=$username';</script>";
        } else {
            echo "Error deleting booking: " . mysqli_error($link);
        }
    } else {
        echo "Error deleting booking detail: " . mysqli_error($link);
    }
} else {
    echo "No booking ID provided.";
}

mysqli_close($link);
?>

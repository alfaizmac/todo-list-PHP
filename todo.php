<?php
include "db_connect.php";

$newList = $_POST['newList'];

$sql = "INSERT INTO TO_DO_LIST (TO_DO) VALUES (?)";

// Prepare statement
$params = array($newList);
$stmt = sqlsrv_prepare($conn, $sql, $params);

// Execute statement
if ($stmt && sqlsrv_execute($stmt)) {
    echo "<script>
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Failed to add list error');
        window.location.href = 'index.php';
    </script>";
    // Optional: show error details in development
    // die(print_r(sqlsrv_errors(), true));
}

// No need to close manually — cleaned up at end of script
?>
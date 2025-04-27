<?php
include "db_connect.php";

$sql = "SELECT List_ID, TO_DO, Date_Added FROM TO_DO_LIST";
$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main">
        <div class="margin">
            <form action="todo.php" method="POST">
                <div class="inputcontainer">
                    <div class="Title">
                        <h1>Add List</h1>
                    </div>
                    <div class="textbox">
                        <textarea type="text" name="newList" placeholder="Write your new list..." required></textarea>
                    </div>
                    <div class="buttonSubmit">
                        <button type="submit"><span>Submit</span></button>
                    </div>
                </div>
            </form>
            <div class="Table">
                <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                    <div class="Date">
                        <div class="Display">
                            <div class="comment">
                                <div class="TitleDelete">
                                    <span class="TitleName">List </span>
                                    <form action="deleteTodo.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['List_ID']; ?>">
                                        <button>
                                            <svg width="25" height="25" fill="#fff" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16 9v10H8V9h8Zm-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1ZM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <span class="Value"><?php echo htmlspecialchars($row['TO_DO']); ?></span>
                            </div>
                        </div>
                        <div class="datetime">
                            <span> <?php echo htmlspecialchars($row['Date_Added']->format('H:i:s Y-m-d')); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
    <script src="js/AddLength.js"></script>
</body>

</html>
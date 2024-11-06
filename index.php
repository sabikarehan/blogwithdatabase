<?php

include  'db.php';


$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);



if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM blogs WHERE id = $id";
    $del_result = mysqli_query($conn, $sql);

    if ($del_result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$conn->close();
?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms || PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .main {
            display: flex;
            flex-wrap: wrap;
        }

        .icon-div {
            display: flex;
            justify-content: end;
            gap: 20px;
            align-items: center;
            flex-direction: row-reverse;
            font-size: 20px;
        }
    </style>
</head>

<body>


    <?php include 'navbar.php' ?>



    <h1 class="mt-4 ms-5">All Blogs</h1>


    <div class="container main">


        <?php foreach ($result as $post): ?>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $post["title"] ?></h5>
                    <p class="card-text"><?php echo $post["content"] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $post["author_name"] ?></small></p>
                    <div class="icon-div">
                        <a href="index.php?id=<?php echo $post["id"] ?>"><i class="bi bi-trash-fill"></i></a>
                        <a href="update.php?id=<?php echo $post["id"] ?>"><i class="bi bi-pencil-fill"></i></a>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>

</body>

</html>
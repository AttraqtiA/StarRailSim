<?php
include_once("controller_HSR.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Star Rail Simulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ropa+Sans&display=swap">
</head>

<body style="font-family: 'Ropa Sans', sans-serif; background-image: url('Asset/background_container.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="Asset/march_icon.png" alt="logo" style="width: 60px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Character
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="fs-6 dropdown-item" href="index.php">List</a></li>
                            <li><a class="fs-6 dropdown-item" href="add_chara_HSR.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Relic
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="fs-6 dropdown-item active" href="list_relic_HSR.php">List</a></li>
                            <li><a class="fs-6 dropdown-item" href="add_relic_HSR.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="relation_HSR.php">Relation Combo</a>
                    </li>
                </ul>
            </div>
            <a href="https://hsr.hoyoverse.com/home" target="_blank" class="mx-3 my-auto fst-italic fs-4 text-decoration-none text-black">"May This Journey Lead Us Starward"</a>
        </div>
    </nav>

    <div class="card text-center mx-auto mb-3" style="width: 95%; background-color: rgba(0, 0, 0, 0); border: 1px solid rgba(0, 0, 0, 0);">
        <br>
        <img src="Asset/StarRail_title.webp" alt="logo" class="mx-auto d-block" style="width: 20%;">
        <h1 class="text-center text-light">Relic List</h1>
        <br>
        <img class="mx-auto" src="Asset/ird_icon.png" alt="logo" style="width: 60px;">

        <div class="card-header mx-2">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="list_relic_HSR.php">Relic List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="add_relic_HSR.php">Add</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Set</th>
                        <th scope="col">Type</th>
                        <th scope="col">Main Stat</th>
                        <th scope="col">Sub Stat</th>
                        <th scope="col">Rarity</th>
                        <th scope="col">Equipped to</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $reliclist = getRelicList();
                    $count = 0;
                    foreach ($reliclist as $index => $relic) {
                        $count++
                    ?>
                        <tr>
                            <th scope="row">
                                <p class="col mt-3"><?= ($count); ?></p>
                            </th>
                            <td class="row">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img style="width: 50px" src="<?= "Asset/Relic/" . $relic->set . ".webp" ?>" alt="Relic Image">
                                    <p class="col mt-3"><?= $relic->set ?></p>
                                </div>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $relic->type ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $relic->mainstat ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $relic->substat[0] . " / " . $relic->substat[1] . " / " . $relic->substat[2] . " / " . $relic->substat[3] ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $relic->rarity ?></p>
                            </td>
                            <th>
                                <a href="update_relic_HSR.php?update_ID=<?= $index ?>" class="text-decoration-none">
                                    <button class="btn btn-warning mt-2">Update</button>
                                </a>
                                <a href="controller_HSR.php?delete_relic_ID=<?= $index ?>" class="text-decoration-none">
                                    <button class="btn btn-danger mt-2">Delete</button>
                                </a>
                            </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
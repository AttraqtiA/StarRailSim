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
            <a class="navbar-brand" href="index.php"><img src="Asset/qq_icon.png" alt="logo" style="width: 60px;"></a>
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
                        <a class="nav-link fs-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Relic
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="fs-6 dropdown-item" href="list_relic_HSR.php">List</a></li>
                            <li><a class="fs-6 dropdown-item" href="add_relic_HSR.php">Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 active" aria-current="page" href="relation_HSR.php">Relation Combo</a>
                    </li>
                </ul>
            </div>
            <a href="https://hsr.hoyoverse.com/home" target="_blank" class="mx-3 my-auto fst-italic fs-4 text-decoration-none text-black">"May This Journey Lead Us Starward"</a>
        </div>
    </nav>

    <div class="card text-center mx-auto mb-3" style="width: 95%; background-color: rgba(0, 0, 0, 0); border: 1px solid rgba(0, 0, 0, 0);">
        <br>
        <img src="Asset/StarRail_title.webp" alt="logo" class="mx-auto d-block" style="width: 20%;">
        <h1 class="text-center text-light">Equip your Relics!</h1>
        <br>
        <img class="mx-auto" src="Asset/relation_icon.png" alt="logo" style="width: 60px;">


        <p class="text-white mt-3">*Change or update the relic combination in the Apply Relic page</p>
        <!-- <form method="POST" action="controller_HSR.php" class="mx-auto">
            <button name="reset_button" class="btn btn-success mt-2">Reset</button>
        </a> -->

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Path</th>
                        <th scope="col">Element</th>
                        <th scope="col">Rarity</th>
                        <th scope="col">Region</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $charalist = getCharaList();
                    $count = 0;
                    foreach ($charalist as $index => $chara) {
                        $count++
                    ?>
                        <tr>
                            <th scope="row">
                                <p class="col mt-3"><?= ($count); ?></p>
                            </th>
                            <td class="row text-center">
                                <img style="width: 75px;" src="<?= "Asset/" . $chara->name . ".webp" ?>" alt="Category Image">
                                <p class="col mt-3"><?= $chara->name ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $chara->path ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $chara->element ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $chara->rarity ?></p>
                            </td>
                            <td>
                                <p class="col mt-3"><?= $chara->region ?></p>
                            </td>
                            <th>
                                <a href="edit_HSR.php?apply_ID=<?= $index ?>" class="text-decoration-none">
                                    <button class="btn btn-success mt-2">Apply Relic</button>
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
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
            <a class="navbar-brand" href="index.php"><img src="Asset/stelle_icon.png" alt="logo" style="width: 60px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Character
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="fs-6 dropdown-item" href="index.php">List</a></li>
                            <li><a class="fs-6 dropdown-item active" href="add_chara_HSR.php">Add</a></li>
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
                        <a class="nav-link fs-5" aria-current="page" href="relation_HSR.php">Relation Combo</a>
                    </li>
                </ul>
            </div>
            <a href="https://hsr.hoyoverse.com/home" target="_blank" class="mx-3 my-auto fst-italic fs-4 text-decoration-none text-black">"May This Journey Lead Us Starward"</a>
        </div>
    </nav>

    <div class="card text-center mx-auto mb-5" style="width: 95%; background-color: rgba(0, 0, 0, 0); border: 1px solid rgba(0, 0, 0, 0);">
        <br>
        <img src="Asset/StarRail_title.webp" alt="logo" class="mx-auto d-block" style="width: 20%;">
        <h1 class="text-center text-light">Customize Your Unit!</h1>
        <br>
        <img class="mx-auto" src="Asset/chara_icon.png" alt="logo" style="width: 60px;">

        <div class="card-header mx-2">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Character List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add_chara_HSR.php">Add</a>
                </li>
            </ul>
        </div>
        <form method="POST" action="controller_HSR.php" class="w-75 mx-auto">
            <div class="pt-5 row g-3 text-light">
                <div class="col-md-4">
                    <label for="input_name" class="form-label">Name</label>
                    <select name="input_name" class="form-select">
                        <?php if ($chara->name != null) { ?>
                            <option selected><?= $chara->name ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $name_list = array(
                            "Topaz and Numby", "Jingliu", "Fu Xuan", "Dan Heng Imbibitor Lunae", "Lynx", "Kafka", "Blade", "Luka", "Luocha", "Silver Wolf",
                            "Yukong", "Jing Yuan", "Seele", "Bailu", "Yanqing", "Clara", "Gepard", "Bronya", "Welt", "Himeko", "Sushang", "Tingyun", "Qingque", "Hook", "Sampo", "Pela",
                            "Natasha", "Serval", "Herta", "Asta", "Arlan", "Dan Heng", "March 7th", "Trailblazer (Male)", "Trailblazer (Female)"
                        );
                        foreach ($name_list as $name) {
                            if ($name != $chara->name) {
                            ?>
                                <option><?= $name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input_path" class="form-label">Path</label>
                    <select name="input_path" class="form-select">
                        <?php if ($chara->path != null) { ?>
                            <option selected><?= $chara->path ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $path_list = array("Destruction", "Hunt", "Erudition", "Harmony", "Nihility", "Preservation", "Abundance");
                        foreach ($path_list as $path) {
                            if ($path != $chara->path) {
                            ?>
                                <option><?= $path ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input_element" class="form-label">Element</label>
                    <select name="input_element" class="form-select">
                        <?php if ($chara->element != null) { ?>
                            <option selected><?= $chara->element ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $element_list = array("Physical", "Fire", "Ice", "Lightning", "Wind", "Quantum", "Imaginary");
                        foreach ($element_list as $element) {
                            if ($element != $chara->element) {
                            ?>
                                <option><?= $element ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="input_rarity" class="form-label">Rarity</label>
                    <select name="input_rarity" class="form-select">
                        <?php if ($chara->rarity != null) { ?>
                            <option selected><?= $chara->rarity ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $rarity_list = array("5*", "4*");
                        foreach ($rarity_list as $rarity) {
                            if ($rarity != $chara->rarity) {
                            ?>
                                <option><?= $rarity ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="input_region" class="form-label">Region</label>
                    <select name="input_region" class="form-select">
                        <?php if ($chara->region != null) { ?>
                            <option selected><?= $chara->region ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $region_list = array("Astral Express", "Herta Office", "Stellaron Hunter", "Jarilo-VI", "Xianzhou Luofu");
                        foreach ($region_list as $region) {
                            if ($region != $chara->region) {
                            ?>
                                <option><?= $region ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="pt-3 pb-5 row g-3 text-light">
                <div class="col-md-3">
                    <label for="input_hp" class="form-label">HP</label>
                    <input type="number" class="form-control" name="input_hp">
                </div>
                <div class="col-md-3">
                    <label for="input_attack" class="form-label">Attack</label>
                    <input type="number" class="form-control" name="input_attack">
                </div>
                <div class="col-md-3">
                    <label for="input_defense" class="form-label">Defense</label>
                    <input type="number" class="form-control" name="input_defense">
                </div>
                <div class="col-md-3">
                    <label for="input_spd" class="form-label ">SPD</label>
                    <input type="number" class="form-control" name="input_spd">
                </div>
            </div>

            <div class="col-md-12">
                <button name="button_add_chara" type="submit" class="btn btn-lg btn-primary">Summon</button>
            </div>
        </form>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
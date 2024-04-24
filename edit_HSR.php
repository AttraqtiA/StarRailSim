<?php
include_once("controller_HSR.php");
if (isset($_GET["apply_ID"])) {
    $apply_ID = $_GET["apply_ID"];
    $chara = getCharabyID($_GET["apply_ID"]);
}
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
            <a class="navbar-brand" href="index.php"><img src="Asset/sw_icon.png" alt="logo" style="width: 60px;"></a>
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
                            <li><a class="fs-6 dropdown-item" href="list_relic_HSR.php">List</a></li>
                            <li><a class="fs-6 dropdown-item active" href="add_relic_HSR.php">Add</a></li>
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

    <div class="card text-center mx-auto mb-5" style="width: 95%; background-color: rgba(0, 0, 0, 0); border: 1px solid rgba(0, 0, 0, 0);">
        <br>
        <img src="Asset/StarRail_title.webp" alt="logo" class="mx-auto d-block" style="width: 20%;">
        <br>
        <p class="text-white mt-3">*In order to delete or update relation, please Unequip through the Relic Option Dropdown</p>
        <br>
        <h1 class="text-white mt-3"><?= $chara->name ?></h1>

        <img src="https://hsr.honeyhunterworld.com/img/character/<?= str_replace(' ', '-', strtolower($chara->name)) ?>-character_cut_in_front.webp" alt="Background Image" class="img-fluid position-absolute start-50 translate-middle" style="top: 80%; width: 750px; transform: translateX(-50%); z-index: -5;">

        <form method="POST" action="controller_HSR.php" class="mx-auto w-75">
            <div>
                <div class="p-5 g-3 text-light d-flex justify-content-around">

                    <div class="">
                        <label for="input_relic1" class="form-label">Relic I</label>
                        <select name="input_relic1" class="form-select">
                            <?php
                            $reliclist = getRelicList();
                            $relationlist = getRelationList();

                            if ($relationlist[$apply_ID][0] != null) {
                                if ($reliclist[$relationlist[$apply_ID][0]]->set != null) { ?>
                                    <option value="<?= $relationlist[$apply_ID][0] ?>" selected><?= ($relationlist[$apply_ID][0] + 1) . ". " . $reliclist[$relationlist[$apply_ID][0]]->set ?></option>
                                    <option>Unequip</option>
                                <?php } else {
                                    unset($relationlist[$apply_ID][0]);
                                    $relationlist[$apply_ID][0] = null;
                                ?>
                                    <option selected>Empty Slot</option>
                                <?php }
                            } else { ?>
                                <option selected>Empty Slot</option>
                            <?php }

                            foreach ($reliclist as $index => $relic) {
                            ?>
                                <option value="<?= $index ?>"><?= ($index + 1) . ". " . $relic->set ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="input_relic2" class="form-label">Relic II</label>
                        <select name="input_relic2" class="form-select">
                            <?php
                            $reliclist = getRelicList();
                            $relationlist = getRelationList();

                            if ($relationlist[$apply_ID][1] != null) { 
                                if ($reliclist[$relationlist[$apply_ID][1]]->set != null) { ?>
                                <option value="<?= $relationlist[$apply_ID][1] ?>" selected><?= ($relationlist[$apply_ID][1] + 1) . ". " . $reliclist[$relationlist[$apply_ID][1]]->set ?></option>
                                <option>Unequip</option>
                                <?php } else {
                                    unset($relationlist[$apply_ID][1]);
                                    $relationlist[$apply_ID][1] = null;
                                ?>
                                    <option selected>Empty Slot</option>
                                <?php }
                            } else { ?>
                                <option selected>Empty Slot</option>
                            <?php }

                            foreach ($reliclist as $index => $relic) {
                            ?>
                                <option value="<?= $index ?>"><?= ($index + 1) . ". " . $relic->set ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <br><br><br><br>
                <div class="p-5 g-3 text-light d-flex justify-content-around">

                    <div class="">
                        <label for="input_relic3" class="form-label">Relic III</label>
                        <select name="input_relic3" class="form-select" value="<?= $chara->rarity ?>">
                            <?php
                            $reliclist = getRelicList();
                            $relationlist = getRelationList();

                            if ($relationlist[$apply_ID][2] != null) {
                                if ($reliclist[$relationlist[$apply_ID][2]]->set != null) { ?>
                                <option value="<?= $relationlist[$apply_ID][2] ?>" selected><?= ($relationlist[$apply_ID][2] + 1) . ". " . $reliclist[$relationlist[$apply_ID][2]]->set ?></option>
                                <option>Unequip</option>
                                <?php } else {
                                    unset($relationlist[$apply_ID][2]);
                                    $relationlist[$apply_ID][2] = null;
                                ?>
                                    <option selected>Empty Slot</option>
                                <?php }
                            } else { ?>
                                <option selected>Empty Slot</option>
                            <?php }

                            foreach ($reliclist as $index => $relic) {
                            ?>
                                <option value="<?= $index ?>"><?= ($index + 1) . ". " . $relic->set ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="input_relic4" class="form-label">Relic IV</label>
                        <select name="input_relic4" class="form-select" value="<?= $chara->rarity ?>">
                            <?php
                            $reliclist = getRelicList();
                            $relationlist = getRelationList();

                            if ($relationlist[$apply_ID][3] != null) {
                                if ($reliclist[$relationlist[$apply_ID][3]]->set != null) { ?>
                                <option value="<?= $relationlist[$apply_ID][3] ?>" selected><?= ($relationlist[$apply_ID][3] + 1) . ". " . $reliclist[$relationlist[$apply_ID][3]]->set ?></option>
                                <option>Unequip</option>
                                <?php } else {
                                    unset($relationlist[$apply_ID][3]);
                                    $relationlist[$apply_ID][3] = null;
                                ?>
                                    <option selected>Empty Slot</option>
                                <?php }
                            } else { ?>
                                <option selected>Empty Slot</option>
                            <?php }

                            foreach ($reliclist as $index => $relic) {
                            ?>
                                <option value="<?= $index ?>"><?= ($index + 1) . ". " . $relic->set ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>

                </div>
            </div>

            <br><br><br><br>
            <input type="hidden" name="edit_ID" value="<?= $apply_ID ?>">

            <div class="col-md-12">
                <button name="button_save_combo" type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>
        </form>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
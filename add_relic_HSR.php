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
                        <a class="nav-link fs-5" aria-current="page" href="relation_HSR.php">Relation Congnmbo</a>
                    </li>
                </ul>
            </div>
            <a href="https://hsr.hoyoverse.com/home" target="_blank" class="mx-3 my-auto fst-italic fs-4 text-decoration-none text-black">"May This Journey Lead Us Starward"</a>
        </div>
    </nav>

    <div class="card text-center mx-auto mb-5" style="width: 95%; background-color: rgba(0, 0, 0, 0); border: 1px solid rgba(0, 0, 0, 0);">
        <br>
        <img src="Asset/StarRail_title.webp" alt="logo" class="mx-auto d-block" style="width: 20%;">
        <h1 class="text-center text-light">Customize Your Relic!</h1>
        <br>
        <img class="mx-auto" src="Asset/ird_icon.png" alt="logo" style="width: 60px;">

        <div class="card-header mx-2">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link text-white" href="list_relic_HSR.php">Relic List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add_relic_HSR.php">Add</a>
                </li>
            </ul>
        </div>
        <form method="POST" action="controller_HSR.php" class="w-75 mx-auto">
            <div class="p-5 row g-3 text-light">
                <div class="col-md-4">
                    <label for="input_type" class="form-label">Type</label>
                    <select name="input_type" class="form-select">
                        <?php if ($relic->type != null) { ?>
                            <option selected><?= $relic->type ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $type_list = array(
                            "Head", "Hands", "Body", "Feet", "Planar Sphere", "Link Rope"
                            );
                        foreach ($type_list as $type) {
                            if ($type != $relic->type) {
                            ?>
                                <option><?= $type ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input_rarity" class="form-label">Rarity</label>
                    <select name="input_rarity" class="form-select">
                        <?php if ($relic->rarity != null) { ?>
                            <option selected><?= $relic->rarity ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $rarity_list = array("5*", "4*");
                        foreach ($rarity_list as $rarity) {
                            if ($rarity != $relic->rarity) {
                            ?>
                                <option><?= $rarity ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input_mainstat" class="form-label">Main Stat</label>
                    <select name="input_mainstat" class="form-select">
                        <?php if ($relic->mainstat != null) { ?>
                            <option selected><?= $relic->mainstat ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $mainstat_list = array("Attack", "Defense", "HP", "SPD", "Crit Rate", "Crit DMG", "Effect Hit Rate", "Effect RES", "Outgoing Healing Boost", "Break Effect", "Energy Regeneration Rate", "Physical DMG Up", "Fire DMG Up", "Ice DMG Up", "Lightning DMG Up", "Wind DMG Up", "Quantum DMG Up", "Imaginary DMG Up");
                        foreach ($mainstat_list as $mainstat) {
                            if ($mainstat != $relic->mainstat) {
                            ?>
                                <option><?= $mainstat ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="input_sub1" class="form-label">Sub Stat I</label>
                    <select name="input_sub1" class="form-select">
                        <?php if ($relic->sub1 != null) { ?>
                            <option selected><?= $relic->sub1 ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $sub1_list = array("Attack", "Defense", "HP", "SPD", "Crit Rate", "Crit DMG", "Effect Hit Rate", "Effect RES", "Break Effect");
                        foreach ($sub1_list as $sub1) {
                            if ($sub1 != $relic->substat[0]) {
                            ?>
                                <option><?= $sub1 ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="input_sub2" class="form-label">Sub Stat II</label>
                    <select name="input_sub2" class="form-select">
                        <?php if ($relic->sub2 != null) { ?>
                            <option selected><?= $relic->sub2 ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $sub2_list = array("Attack", "Defense", "HP", "SPD", "Crit Rate", "Crit DMG", "Effect Hit Rate", "Effect RES", "Break Effect");
                        foreach ($sub2_list as $sub2) {
                            if ($sub2 != $relic->substat[1]) {
                            ?>
                                <option><?= $sub2 ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="input_sub3" class="form-label">Sub Stat III</label>
                    <select name="input_sub3" class="form-select">
                        <?php if ($relic->sub3 != null) { ?>
                            <option selected><?= $relic->sub3 ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $sub3_list = array("Attack", "Defense", "HP", "SPD", "Crit Rate", "Crit DMG", "Effect Hit Rate", "Effect RES", "Break Effect");
                        foreach ($sub3_list as $sub3) {
                            if ($sub3 != $relic->substat[2]) {
                            ?>
                                <option><?= $sub3 ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="input_sub4" class="form-label">Sub Stat IV</label>
                    <select name="input_sub4" class="form-select">
                        <?php if ($relic->sub4 != null) { ?>
                            <option selected><?= $relic->sub4 ?></option>
                        <?php } else { ?>
                            <option selected>Choose...</option>
                            <?php }
                        $sub4_list = array("Attack", "Defense", "HP", "SPD", "Crit Rate", "Crit DMG", "Effect Hit Rate", "Effect RES", "Break Effect");
                        foreach ($sub4_list as $sub4) {
                            if ($sub4 != $relic->substat[3]) {
                            ?>
                                <option><?= $sub4 ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="input_set" class="form-label">Set</label>
                            <select name="input_set" class="form-select">
                                <?php if ($relic->set != null) { ?>
                                    <option selected><?= $relic->set ?></option>
                                <?php } else { ?>
                                    <option selected>Choose...</option>
                                    <?php }
                                $set_list = array("Band of Sizzling Thunder", "Champion of Streetwise Boxing", "Eagle of Twilight Line", "Firesmith of Lava-Forging", "Genius of Brilliant Stars", "Guard of Wuthering Snow", "Hunter of Glacial Forest", "Knight of Purity Palace", "Longevous Disciple", "Messenger Traversing Hackerspace", "Musketeer of Wild Wheat",
                                "Passerby of Wandering Cloud", "Thief of Shooting Meteor", "Wastelander of Banditry Desert", "Belobog of the Architects", "Broken Keel", "Celestial Differentiator", "Fleet of the Ageless", "Inert Salsotto", "Pan-Cosmic Commercial Enterprise", "Rutilant Arena", "Space Sealing Station", "Sprightly Vonwacq", "Talia Kingdom of Banditry");
                                foreach ($set_list as $set) {
                                    if ($set != $relic->set) {
                                    ?>
                                        <option><?= $set ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

    

            <div class="col-md-12">
                <button name="button_add_relic" type="submit" class="btn btn-lg btn-primary">Synthesize</button>
            </div>
            <div class="col-md-12 mt-1">
                <button name="button_equip_relic" type="submit" class="btn text-light"> + Equip</button>
            </div>
        </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
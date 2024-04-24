<?php
include_once("model_HSR.php");
session_start();

if (!isset($_SESSION['chara_list'])) {
    $_SESSION['chara_list'] = array();
}

if (isset($_POST['button_add_chara'])) {
    add_chara();
    header("Location:index.php");
}

function add_chara()
{
    $chara = new character();
    $chara->name = $_POST['input_name'];
    $chara->path = $_POST['input_path'];
    $chara->element = $_POST['input_element'];
    $chara->rarity = $_POST['input_rarity'];
    $chara->region = $_POST['input_region'];
    $chara->hp = $_POST['input_hp'];
    $chara->attack = $_POST['input_attack'];
    $chara->def = $_POST['input_defense'];
    $chara->spd = $_POST['input_spd'];

    array_push($_SESSION['chara_list'], $chara);
}

function update_chara($chara_ID)
{
    $chara = $_SESSION['chara_list'][$chara_ID];
    $chara->name = $_POST['input_name'];
    $chara->path = $_POST['input_path'];
    $chara->element = $_POST['input_element'];
    $chara->rarity = $_POST['input_rarity'];
    $chara->region = $_POST['input_region'];
    $chara->hp = $_POST['input_hp'];
    $chara->attack = $_POST['input_attack'];
    $chara->def = $_POST['input_defense'];
    $chara->spd = $_POST['input_spd'];
}

function getCharaList()
{
    return $_SESSION['chara_list'];
}

if (isset($_GET['delete_chara_ID'])) {
    killchara($_GET['delete_chara_ID']);
    header("Location:index.php");
}
function killChara($index)
{
    unset($_SESSION['chara_list'][$index]);
}
function getCharabyID($index)
{
    return $_SESSION['chara_list'][$index];
}

if (isset($_POST['button_update_chara'])) {
    update_chara($_POST['update_ID']);
    header("Location:index.php");
}

//============================================================================================

if (!isset($_SESSION['relic_list'])) {
    $_SESSION['relic_list'] = array();
}

if (isset($_POST['button_add_relic'])) {
    add_relic();
    header("Location:list_relic_HSR.php");
}

if (isset($_POST['button_equip_relic'])) {
    add_relic();
    header("Location:relation_HSR.php");
}

function add_relic()
{
    $relic = new relic();
    $relic->type = $_POST['input_type'];
    $relic->rarity = $_POST['input_rarity'];
    $relic->mainstat = $_POST['input_mainstat'];
    array_push($relic->substat, $_POST['input_sub1']);
    array_push($relic->substat, $_POST['input_sub2']);
    array_push($relic->substat, $_POST['input_sub3']);
    array_push($relic->substat, $_POST['input_sub4']);
    $relic->set = $_POST['input_set'];

    array_push($_SESSION['relic_list'], $relic);
}

function update_relic($relic_ID)
{
    $relic = $_SESSION['relic_list'][$relic_ID];
    $relic->type = $_POST['input_type'];
    $relic->rarity = $_POST['input_rarity'];
    $relic->mainstat = $_POST['input_mainstat'];
    $relic->substat[0] = $_POST['input_sub1'];
    $relic->substat[1] = $_POST['input_sub2'];
    $relic->substat[2] = $_POST['input_sub3'];
    $relic->substat[3] = $_POST['input_sub4'];
    $relic->set = $_POST['input_set'];
}

function getRelicList()
{
    return $_SESSION['relic_list'];
}

if (isset($_GET['delete_relic_ID'])) {
    SalvageRelic($_GET['delete_relic_ID']);
    header("Location:list_relic_HSR.php");
}
function SalvageRelic($index)
{
    unset($_SESSION['relic_list'][$index]);
}
function getRelicbyID($index)
{
    return $_SESSION['relic_list'][$index];
}

if (isset($_POST['button_update_relic'])) {
    update_relic($_POST['update_ID']);
    header("Location:list_relic_HSR.php");
}

//============================================================================================

if (!isset($_SESSION['relation_list'])) {
    $_SESSION['relation_list'] = array();
}

function getRelationList()
{
    return $_SESSION['relation_list'];
}

if (isset($_POST['button_save_combo'])) {
    edit_relation($_POST['edit_ID']);
}

function edit_relation($indexChara)
{

    $latest_index = -1;
    foreach ($_SESSION['relation_list'] as $i => $relation) {
        if ($i == $indexChara) {
            $latest_index = $i;
            break;
        }
    }

    for ($i = 1; $i <= 4; $i++) {
        if ($_POST["input_relic$i"] == "Unequip" || $_POST["input_relic$i"] == "Empty Slot") {
            $_POST["input_relic$i"] = null;
        }
    }
    

    if ($latest_index != -1) {
        //already exist, update

        $_SESSION['relation_list'][$latest_index] = array(); 
        $_SESSION['relation_list'][$latest_index][0] = $_POST['input_relic1'];
        $_SESSION['relation_list'][$latest_index][1] = $_POST['input_relic2'];
        $_SESSION['relation_list'][$latest_index][2] = $_POST['input_relic3'];
        $_SESSION['relation_list'][$latest_index][3] = $_POST['input_relic4'];
    } else {
        // kalau tidak ketemu sama sekali, add new
        array_push($_SESSION['relation_list'], $indexChara);

        $_SESSION['relation_list'][$indexChara] = array(
            $_POST['input_relic1'],
            $_POST['input_relic2'],
            $_POST['input_relic3'],
            $_POST['input_relic4']
        );
    }

    header("Location:relation_HSR.php?apply_ID=$indexChara");
}

if (isset($_POST['reset_button'])) {
    session_destroy(); //hanya untuk kebutuhan debugging/destroy session
    header("Location:relation_HSR.php");
}

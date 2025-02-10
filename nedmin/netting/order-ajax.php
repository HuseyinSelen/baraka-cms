<?php
require_once 'class.crud.php';
$db = new crud();

if (isset($_GET['blogs_must'])) {

    $sonuc = $db->orderUpdate("blogs", $_POST['item'], "blogs_must", "blogs_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['users_must'])) {

    $sonuc = $db->orderUpdate("users", $_POST['item'], "users_must", "users_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['admins_must'])) {

    $sonuc = $db->orderUpdate("admins", $_POST['item'], "admins_must", "admins_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['sliders_must'])) {

    $sonuc = $db->orderUpdate("sliders", $_POST['item'], "sliders_must", "sliders_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['settings_must'])) {

    $sonuc = $db->orderUpdate("settings", $_POST['item'], "settings_must", "settings_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['abouts_must'])) {

    $sonuc = $db->orderUpdate("abouts", $_POST['item'], "abouts_must", "abouts_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['icecekler_must'])) {

    $sonuc = $db->orderUpdate("icecekler", $_POST['item'], "icecekler_must", "icecekler_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['sunbeds_must'])) {

    $sonuc = $db->orderUpdate("sunbeds", $_POST['item'], "sunbeds_must", "sunbeds_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['foods_must'])) {

    $sonuc = $db->orderUpdate("foods", $_POST['item'], "foods_must", "foods_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

if (isset($_GET['drinks_must'])) {

    $sonuc = $db->orderUpdate("drinks", $_POST['item'], "drinks_must", "drinks_id");
    //$returnMsg=array();
    $returnMsg = ['islemSonuc' => true, 'islemMsj' => $sonuc['status']];
    echo json_encode($returnMsg);
}

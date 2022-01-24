<?php
include('db.php');
header("Content-Type:application/json");

if (isset($_GET['name']) && $_GET['name'] != "") {
    $name = $_GET['name'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name'");

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        $result = [
            "user" => [
                "name" => $row['name'],
                "email" => $row['email'],
                "phone" => $row['phone']
            ],
            "message" => "Here is your all data",
            "code" => 200
        ];

        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result = [
            "message" => "No Record Found",
            "code" => 404
        ];
        echo json_encode($result);
    }
}


if (isset($_GET['data'])) {
    $result = mysqli_query($conn, "SELECT * FROM setting WHERE id = '1' ");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $result = [
            "id" => $row['id'],
            "app_name" => $row['app_name'],
            "banner_id" => $row['admob_banner_id'],
            "interstitial_id" => $row['admob_interstitial_id']
        ];

        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result = [
            "message" => "No Record Found",
            "code" => 404
        ];
        echo json_encode($result);
    }
}

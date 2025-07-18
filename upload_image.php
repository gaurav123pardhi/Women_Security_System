<?php
$data = json_decode(file_get_contents("php://input"));

if (isset($data->image)) {
    $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $data->image);
    $base64 = str_replace(' ', '+', $base64);
    $imageData = base64_decode($base64);

    $folder = "uploads/";
    if (!file_exists($folder)) mkdir($folder, 0777, true);

    $filename = $folder . "photo_" . time() . ".png";

    if (file_put_contents($filename, $imageData)) {
        echo json_encode([
            "success" => true,
            "url" => "http://localhost/yourfolder/" . $filename // Change this to your real path
        ]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
?>

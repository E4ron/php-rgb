<?php
session_start();

$message = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newTempFileName = md5(time()) . '.' . $fileExtension;
        // check if file has one of the following extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'jfif');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $tempFileDir = './tmp/';
            $uploadFileDir = './uploaded_files/';

            if (is_dir($tempFileDir)) {
                foreach (glob($tempFileDir . '*', GLOB_MARK) as $file) {
                    unlink($file);
                }
            }
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            $dest_path = $tempFileDir . $newTempFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $newFileName = sha1_file($dest_path) . '.' . $fileExtension;
                $roblox_sex = $uploadFileDir . $newFileName;
                copy($dest_path, $roblox_sex);

                require_once("connect.php");
                require_once("session.php");
                $id = $_SESSION["user"]["id"];

                if ($_SESSION['user'] && $result = mysqli_query($connect, "UPDATE `users` SET `photo_url`='$newFileName' WHERE id='$id'")) {
                    $message = 'File is successfully uploaded.' . $newFileName;
                } else {
                    $message = 'Ошибка базы данных.';
                    if ($_SESSION['user']) {
                        $message = $message . "500";
                    } else {
                        $message = $message . "401";
                    }
                }
            } else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}

$_SESSION['message'] = $message;
header("Location: ../profile.php");

<?php
 require_once 'settings.php';

 $connection = new mysqli($host, $user, $password, $bd);


function loadMyXml($file_name){
    global $connection;
    $xml = simplexml_load_file($file_name);
    foreach ($xml->item as $item) {
        $id = $item->id;
        $name = $item->name;
        $email = $item->email;
        $password = $item->password;
        $connection->query("INSERT INTO export (id, name, email, password) VALUES ('$id', '$name', '$email', '$password')");

    }
    return 1;

}



function getInstitutes() {
    global $connection;
    $result = $connection->query("SELECT * FROM institutes");
    return $result;
}
function loadUser($login, $email, $password) {
    global  $connection;
    $result =  $connection->query("SELECT * FROM users");
    $rows = $result->num_rows;
    for ($i=0; $i<$rows; ++$i) {
        $result->data_seek($i);
        $l = $result->fetch_assoc()['login'];
        $result->data_seek($i);
        $e = $result->fetch_assoc()['email'];
        if ($login == $l || $email == $e) {
            return 0;
        }
    }
    $connection->query("INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')");
    return 1;
}

function GetUser($login, $email, $password) {
    global $connection;
    $result =  $connection->query("SELECT * FROM users WHERE login = '$login' AND email = '$email' AND password = '$password'");
    if ($result->num_rows > 0) {
        $result->data_seek(0);
        $id = $result->fetch_assoc()['id'];
        $result->data_seek(0);
        $login = $result->fetch_assoc()['login'];
        $result->data_seek(0);
        $email = $result->fetch_assoc()['email'];
        $UserArr = [$id, $login, $email];
        return $UserArr;
    }
    else {
        return  0;
    }



}

function loadImg($id_user, $path) {
    global $connection;
    $result = $connection->query("INSERT INTO images (user_id, src) VALUES ('$id_user', '$path')");

}

function getImagesUser($user_id) {
    global $connection;
    $result =  $connection->query("SELECT * FROM images WHERE user_id = '$user_id'");
    return $result;
}
function getUserMenu($id_user) {
    global $connection;
    $result = $connection->query("SELECT * FROM users_menu WHERE user_id = '$id_user'");
    return $result;

}
function addMenu($name, $url, $id_user) {
    global  $connection;
    $result2 = $connection->query("SELECT * FROM users_menu WHERE user_id = '$id_user'");
    $rows = $result2->num_rows;

        for ($i = 0; $i < $rows; ++$i) {
            $result2->data_seek($i);
            $name1 = $result2->fetch_assoc()['name'];
            if ($name1 == $name) {
                return  0;
            }
        }


        $result = $connection->query("INSERT INTO users_menu (user_id, url, name) VALUES ('$id_user', '$url', '$name')");
        return $result;
}
function deleteUserMenu($id_user, $name) {
    global $connection;
    $result = $connection->query("DELETE FROM users_menu WHERE name = '$name' AND user_id = '$id_user'");
    return $result;
}

function searchInstituts($name) {
    global $connection;
    $result = $connection->query("SELECT * FROM institutes WHERE name = '$name'");
    return $result;
}



?>
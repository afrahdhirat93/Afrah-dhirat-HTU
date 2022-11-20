<?php



/**

 * HTU Redirect - redirects the request to another url.

 *

 * @param String $path

 * @return void

 */

function htu_redirect($path)

{

    header("Location: $path");

    exit();

}


function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "coh9_php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // var_dump($conn);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}


function get_users()
{
    $sql = "SELECT * FROM users";
    $result = mysqli_query(connect(), $sql);

    // $first_row = mysqli_fetch_assoc($result);
    // $second_row = mysqli_fetch_assoc($result);
    // $third_row = mysqli_fetch_assoc($result);
    $users = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    return $customers;
}

function create_users( $email, $password)
{
    $connection = connect();
    $sql = "INSERT INTO users ( email,password) VALUES ( '$email', '$password')";
    $result = mysqli_query($connection, $sql);
    $id = $connection->insert_id;
    return $id;
}
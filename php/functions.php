<?php

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){

        extract($variables);

        ob_start();

        include $filePath;

        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

}

function baseUrl(){
    $url = url();
    $url = parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST); 
    return $base_url = trim($url, '/');
}

function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
}


// PHP 2

function triangleUpsideLeft($jumlah,$bentuk){
    for($i=0; $i<=$jumlah; $i++)
    {
        for($j=0; $j<=$i; $j++){
            echo $bentuk."&nbsp;&nbsp;";
        }
        echo "<br>";
    }
}

function triangleDownsideLeft($jumlah,$bentuk){
    for($i=0; $i<=$jumlah; $i++)
    {
        for($j=$jumlah; $j>=$i; $j--){
            echo $bentuk."&nbsp;&nbsp;";
        }
        echo "<br>";
    }
}

function triangleUpsideRight($jumlah,$bentuk){

    for($i=0; $i<=$jumlah; $i++) {
        for($j=1; $j<=$jumlah-$i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        for($k=0; $k<=$i; $k++) {
            echo "&nbsp;".$bentuk;
        }
        echo "<br>";
    }
}

function triangleDownsideRight($jumlah,$bentuk){
    for ($i=$jumlah; $i>=0; $i--)
    {
        for($k=$i; $k<=$jumlah; $k++)
        {
            echo "&nbsp;&nbsp;";
        }

        for($j=0; $j<=$i; $j++)
        {
            echo $bentuk."&nbsp;";
        }
       echo "<br>";
    }
}

function pilihPattern($pattern){
    switch ($pattern){
        case 1:
            triangleUpsideLeft(5,"*");
            break;
        case 2:
            triangleUpsideRight(5,"*");
            break;
            
            case 3:
            triangleDownsideLeft(5,"*");
            break;
        
        case 4:
            triangleDownsideRight(5,"*");
            break;
        
        default:
            return 0;
    }
}

if(isset($_POST['pattern'])){
    return pilihPattern($_POST['pattern']);
}

// php 3

function conn($dbname, $user, $pass)
{
    $mysqli = new mysqli($_SERVER['SERVER_NAME'], $user, $pass, $dbname);
    if(!$mysqli){
        die();
        return mysqli_errno($mysqli);
    }else{
        return $mysqli;
    }
}

function insertCategories($name){
    $mysqli = conn("ta_magang", "root", "");
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO categories(name,created_at,updated_at) VALUES('$name','$now','$now')");
}

function insertProducts($category_id, $name, $description, $price, $status, $created_by) {
    $mysqli = conn("ta_magang", "root", "");
    $now = date('Y-m-d H:i:s');
    $mysqli->query("INSERT INTO products (category_id, name, description, price, status, created_at, updated_at, created_by) VALUES ('$category_id', '$name', '$description', '$price', '$status', '$now', '$now', '$created_by')");
}

function selectProducts(){
    $mysqli = conn("ta_magang", "root", "");
    return $mysqli->query("SELECT c.name as category_name, p.name as products_name, p.description, p.price, p.status FROM products as p INNER JOIN categories as c ON p.category_id = c.id");
}

// php 4

function selectAll($table){
    $mysqli = conn("ta_magang", "root", "");
    return $mysqli->query("SELECT * FROM $table");
}

function selectUsers(){
    $mysqli = conn("ta_magang", "root", "");
    return $mysqli->query("SELECT role_name, users.id as users_id, email,name,avatar,phone,address FROM users JOIN roles ON users.role = roles.id ORDER BY users.id ASC");
}

function selectUsersBy($field,$value){
    $mysqli = conn("ta_magang", "root", "");
    return $mysqli->query("SELECT * FROM users WHERE $field='$value'");
}

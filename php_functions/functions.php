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
    echo $base_url = trim($url, '/');
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
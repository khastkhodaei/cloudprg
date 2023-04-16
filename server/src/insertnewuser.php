<?php

	require '/var/www/vendor/autoload.php';

	$name = $_POST['name'];
	$family = $_POST['family'];
	
	//test the post data
	echo "<p>Name: $name and family: $family</p>";
	
	$connection = new MongoDB\Client("mongodb://root:mongopwd@mongo:27017");
	
	$db = $connection->gettingstarted;
	echo "db 'gettingstarted' selected<br><br>";
	$col = $db->users;
	echo "Collection $col selected<br><br>";
	
	$doc = ["name" => $name,"family" => $family];
	
	$col->insertOne($doc);
	echo "<p>User inserted successfully: ";
	
	
	$record = $col->find( [ 'name' =>$name] );  
    foreach ($record as $user) {  
        echo $user['name'], ': ', $user['family']."</p>";  
    }



	/**
 * Generates random text data of given size
 * @param int $size Size of the data to be generated in bytes
 * @return string Random text data
 */
function generate_random_text_data($size) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $len = strlen($chars);
    $data = '';
    for ($i = 0; $i < $size; $i++) {
        $data .= $chars[rand(0, $len - 1)];
    }
    return $data;
}

// Example usage
$text_data = generate_random_text_data(1024); // 1 KB


	
	$h = fopen("randomtext.txt","w");
	fwrite($h,$text_data);
	fclose($h);


?>

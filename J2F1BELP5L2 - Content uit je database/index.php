<!-- <?php 
    $people = getPeople();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($people as $person){ ?>
        <h1><?= $person['name'] ?></h1>
    <?php } ?>

</body>
</html>

<?php
function getPeople(){

// maak een verbinding
    $connection = connect();

// maak een query
    $query = "SELECT * FROM onderwerpen";

// voorbereid een query
    $statement = $connection->prepare($query);

// voer de query uit
    $statement->execute();

// haal de result op
    $result = $statement->fetchALl();

    return $result;

}

?>
<?php
function connect()
	{
		try {
			$serveraddress = "localhost";
			$dbname = "databank_php";
			$username = "root";
			$password = "mysql";

			$conn = new PDO("mysql:host=$serveraddress;dbname=databank_php", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
			echo "Connected successfully";
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
?>


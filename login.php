<?php
    $host = 'localhost';
    $dbname = 'st';
    $username = 'root';
    $password = '';

    $name = $_POST['user'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  echo "Connected successfully";
    //     //Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO pro (username, password , confirm) VALUES (:username, :password, :cpassword)");
        // echo $name;  
        // // Bind parameters
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':cpassword', $cpass);
        $stmt->execute();

         echo "Data inserted successfully";
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
?>  

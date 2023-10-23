<?php
/*
 * dbh.classes.php
 * handle database connection
 */
class Dbh {
	protected function connect() {
        // define username & password for the database
        // make a connection to the database using PDO()
        // database name : budtrack
		try {
			$username = "root";
			$password = "";
            return new PDO('mysql:host=localhost;dbname=budtrack', $username, $password);

		} catch (PDOException $e) {
            // print the PDO error message
			print("DBH Error!: " . $e->getMessage(). " <br />");
			die();
		}
	}
}

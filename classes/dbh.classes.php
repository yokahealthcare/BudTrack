<?php

class Dbh {

	protected function connect() {
		try {
			$username = "root";
			$password = "";
            return new PDO('mysql:host=localhost;dbname=budtrack', $username, $password);

		} catch (PDOException $e) {
			print("Error!: " . $e->getMessage(). " <br />");
			die();
		}
	}

}

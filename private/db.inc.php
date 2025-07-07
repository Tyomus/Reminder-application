<?php
try {
	$pdo = new PDO (
		'mysql:dbname=reminder_app;host=localhost;charset=utf8',
 		'root', '' );
} catch ( PDOException $e ) {
	die ( $e->getMessage () );
}
?>
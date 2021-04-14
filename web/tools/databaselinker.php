<?php
class databaselinker
{
	private static $urlbdd='mysql:host=localhost;dbname=prestachope_bdd5';
	private static $namebdd='root';
	private static $passwordbdd='';
	private static $bdd;
	public static function getconnexion()
	{
            databaselinker::$bdd = new PDO(databaselinker::$urlbdd,databaselinker::$namebdd,databaselinker::$passwordbdd);
            return databaselinker::$bdd;
	}
}
?>
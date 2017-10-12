<?php 
	require'Database.interface.php';
	class Mysqlbase implements Database{
		private $host, $user, $pass, $db;
		
		public function __cpnstruct($host, $user, $pass, $db){
			$this -> host = $host;
			$this -> user = $user;
			$this -> pass = $pass;
			$this -> db = $db;
		}
		
		public function open(){
			
		}
	
		public function close(){

		}

		public function execute($strSQL){

		}
	}
?>
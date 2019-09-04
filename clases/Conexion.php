<?php 

class conectar{
	private $servidor="localhost";
	private $usuario="root";
	private $password="";
	private $bd="ventas";

	public function conexion(){
		/*$conexion = new PDO('mysql:host='.$this->servidor.';dbname='.$this->bd,$this->usuario,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));*/
				$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);

		return $conexion;
	}
}


?>
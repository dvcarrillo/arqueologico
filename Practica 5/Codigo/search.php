<?php
require_once('db/db.php');

class result{
	public $titulo;
	public $subtitulo;
	public $imagen_principal;
	public function __construct($titulo, $subtitulo, $imagen_principal){
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->imagen_principal = $imagen_principal;
	}
}

function articleSearch($input){
	$list = [];
	$db = ConexionDB::getInstance();
	$result = $db->query("SELECT * FROM articulos WHERE (`titulo` LIKE '%".$input."%') OR (`subtitulo` LIKE '%".$input."%')");
	foreach($result->fetchAll() as $article) {
		$list[]=new result($article['titulo'],$article['subtitulo'], $article['imagen_principal']);
	}
	return $list;
}

	//sleep((float)(rand(200, 2000)) / 1000);

	echo json_encode(articleSearch($_POST["content"]));
?>

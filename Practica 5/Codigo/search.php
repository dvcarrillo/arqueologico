<?php
require_once('db/db.php');

class result{
	public $id_art;
	public $titulo;
	public $subtitulo;
	public $imagen_principal;

	public function __construct($id, $titulo, $subtitulo, $imagen_principal){
		$this->id_art = $id;
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->imagen_principal = $imagen_principal;
	}
}

function articleSearch($input){
	$list = [];
	$db = ConexionDB::getInstance();
	$result = $db->query("SELECT * FROM articulos WHERE (`titulo` LIKE '%".$input."%') OR 
	        (`subtitulo` LIKE '%".$input."%')");

	foreach($result->fetchAll() as $article) {
		$list[]=new result($article['id'], $article['titulo'],$article['subtitulo'], $article['imagen_principal']);
	}
	return $list;
}

	echo json_encode(articleSearch($_POST["content"]));
?>

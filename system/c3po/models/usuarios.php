<?php

class Usuarios extends Model {

	/**
por ahora los usuarios tienen:
	id
	nombreusuario
	creado
	clave

falta tabla openid

	*/
	public function obtenerPorNombreusuario($nombreusuario) {
        return $query = $this->db->get_where('usuarios', array('nombreusuario' => $nombreusuario), 1)->row();
        //return $query->row();
	}

	/*
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('comments', 'comments.id = blogs.id');

		$query = $this->db->get();

		// Produces:
		// SELECT * FROM blogs
		// JOIN comments ON comments.id = blogs.id
	*/
}

?>
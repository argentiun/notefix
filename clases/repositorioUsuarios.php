<?php

	abstract class RepositorioUsuarios {
		abstract public function guardar(Usuario $usuario);
		abstract public function traerTodosLosUsuarios();

		public function existeElMail($email) {
	        $usuario = $this->traerUsuarioPorEmail($email);

	        if ($usuario) {
	            return true;
	        }

	        return false;
	    }

	    public function traerUsuarioPorEmail($email) {
	        $usuarios = $this->traerTodosLosUsuarios();

	        foreach($usuarios as $usuario)
	        {
	            if ($usuario->getEmail() == $email)
	            {
	                return $usuario;
	            }
	        }

	        return false;
	    }
	}

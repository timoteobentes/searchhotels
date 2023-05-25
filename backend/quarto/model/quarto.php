<?php

    class Quarto {

        private $Id;
        private $IdHotel;
        private $numero;
        private $descricao;
        private $valor_diaria;
		private $data_cadastro;


    /**
	 * @return mixed
	 */
	public function getId() {
		return $this->Id;
	}

	/**
	 * @param mixed $Id 
	 * @return self
	 */
	public function setId($Id): self {
		$this->Id = $Id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdHotel() {
		return $this->IdHotel;
	}

	/**
	 * @param mixed $IdHotel 
	 * @return self
	 */
	public function setIdHotel($IdHotel): self {
		$this->IdHotel = $IdHotel;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNumero() {
		return $this->numero;
	}

	/**
	 * @param mixed $numero 
	 * @return self
	 */
	public function setNumero($numero): self {
		$this->numero = $numero;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @param mixed $descricao 
	 * @return self
	 */
	public function setDescricao($descricao): self {
		$this->descricao = $descricao;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValor_diaria() {
		return $this->valor_diaria;
	}

	/**
	 * @param mixed $valor_diaria 
	 * @return self
	 */
	public function setValor_diaria($valor_diaria): self {
		$this->valor_diaria = $valor_diaria;
		return $this;
	}


	/**
	 * @return mixed
	 */
	public function getData_cadastro() {
		return $this->data_cadastro;
	}

	/**
	 * @param mixed $data_cadastro 
	 * @return self
	 */
	public function setData_cadastro($data_cadastro): self {
		$this->data_cadastro = $data_cadastro;
		return $this;
	}
}

?>
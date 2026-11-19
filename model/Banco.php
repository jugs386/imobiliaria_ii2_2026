<?php

/**
 * Classe abstrata Banco
 * Define os 5 métodos que toda classe de modelo (Usuario, Imovel, Visualizacao...)
 * deverá implementar.
 */
abstract class Banco{

    abstract public function save();

    abstract public function remove($id);

    abstract public function find($id);

    abstract public function count();

    abstract public function listAll();
}

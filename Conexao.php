<?php
/**
 * Classe Conexao
 * Responsável por criar (uma única vez) a conexão com o MySQL usando PDO.
 *
 * Obs.: nos slides o endereço aparece como "localhost:3306". No PDO o host e a
 * porta devem ser informados separados no DSN (host=...;port=...), por isso aqui
 * eles ficam em atributos diferentes.
 */
class Conexao{

    private $servername = "localhost";   // endereço do banco de dados
    private $port       = "3306";        // porta de acesso
    private $username   = "root";        // usuário de acesso ao banco (em produção NÃO use o root)
    private $password   = "HORTETEC_115";      // senha de acesso ao banco
    private $database   = "imobiliaria"; // nome do banco de dados
    private $conection;

    public function getConection(){
        if (is_null($this->conection)) {
            $this->conection = new PDO('mysql:host='.$this->servername.';port='.$this->port.';dbname='.$this->database, $this->username, $this->password);
            $this->conection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conection->exec('set names utf8');
        }
        return $this->conection;
    }
}

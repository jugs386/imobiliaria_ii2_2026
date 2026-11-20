<?php

require_once __DIR__ . '/Banco.php';
require_once __DIR__ . '/../Conexao.php';

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto)    {
        $this->foto = $foto;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor)    {
        $this->valor = $valor;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo)    {
        $this->tipo = $tipo;
    }

    /**
     * Cadastra um novo usuário (INSERT) ou atualiza um existente (UPDATE).
     * Se o id for maior que zero, é uma atualização.
     */
    public function save() {

        $result = false;

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //cria query de update passando os atributos que serão atualizados
                $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo WHERE id = :id";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo, ':id'=> $this->id)))
                {
                    $result = $stmt->rowCount();
                }
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into imovel (id, descricao, foto, valor, tipo) values (null,:descricao,:foto,:valor,:tipo)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo))) {
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    /**
     * Remove um usuário pelo id.
     */
    public function remove($id) {

        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de remoção
        $query = "DELETE FROM imovel where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id' => $id))) {
            $result = true;
        }
        return $result;
    }

    /**
     * Busca um usuário pelo id e devolve um objeto imovel (ou false).
     */
    public function find($id) {

        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imovel where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id'=> $id))) {
            //verifica se houve algum registro encontrado
            if ($stmt->rowCount() > 0) {
                //o resultado da busca será retornado como um objeto da classe
                $result = $stmt->fetchObject(Imovel::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    /**
     * Conta quantos imóveis existem (ainda não usado nos slides).
     */
    public function count() {

        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM imovel");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    /**
     * Lista todos os imóveis cadastrados (array de objetos imovel).
     */
    public function listAll() {
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imovel";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute()) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }
}

<?php
require_once __DIR__ . '/../model/Imovel.php';

class ImovelController{
    /**
     * Salvar o imovel submetido pelo formulário
     * (serve para cadastrar um novo e para atualizar um existente)
     */
    public static function salvar()
    {
        //cria um objeto do tipo imovel
        $imovel = new Imovel;

        //armazena as informações do $_POST via set
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);

        //chama o método save para gravar as informações no banco de dados
        $imovel->save();
    }

    /**
     * Lista os imóveis
     */
    public static function listar()
    {
        //cria um objeto do tipo imovel
        $imoveis = new Imovel;
        //chama o método listAll()
        return $imoveis->listAll();
    }

    /**
     * Mostrar formulário para editar um imovel
     */
    public static function editar($id)
    {
        //cria um objeto do tipo imovel
        $imovel = new Imovel;

        $imovel = $imovel->find($id);

        return $imovel;
    }

    /**
     * Apagar um imovel conforme o id informado
     */
    public static function excluir($id)
    {
        //cria um objeto do tipo imovel
        $imovel = new Imovel;

        $imovel = $imovel->remove($id);

    }
}

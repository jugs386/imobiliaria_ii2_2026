<div class="card">
    <div class="card-header">Imóveis</div>

    <form name="cadImovel" id="cadImovel" action="" method="post">
        <div class="card-body">

            <!-- guarda o id do usuário que está sendo editado (vazio no cadastro) -->
            <input type="hidden" name="id" id="id"
                   value="<?php echo isset($imovel)?$imovel->getId():''; ?>" />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                <input type="text" class="form-control col-sm-8" name="descricao" id="descricao"
                       value="<?php echo isset($imovel)?$imovel->getDescricao():'' ?>" />
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="text" class="form-control col-sm-8" name="foto" id="foto"
                       value="<?php echo isset($imovel)?$imovel->getFoto():'' ?>" />
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">Valor:</label>
                <input type="number"  step="0.01" class="form-control col-sm-8" name="valor" id="valor"
                       value="<?php echo isset($imovel)?$imovel->getValor():'' ?>" />
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control col-sm-8">
                    <option value="0"></option>
                    <option value="A" <?php echo isset($imovel) && $imovel->getTipo()=='A'?'selected':'' ?>>Apartamento</option>
                    <option value="C" <?php echo isset($imovel) && $imovel->getTipo()=='C'?'selected':'' ?>>Casa</option>
                    <option value="T" <?php echo isset($imovel) && $imovel->getTipo()=='T'?'selected':'' ?>>Terreno</option>
                </select>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar" value="Enviar">
        </div>
    </form>
</div>

<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //importa o UsuarioController.php
    require_once __DIR__ . '/../controller/ImovelController.php';
    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    call_user_func(array('ImovelController','salvar'));
    //redireciona para a lista de Imóveis
    header('Location: index.php?page=imovel&action=listar');
}

?>

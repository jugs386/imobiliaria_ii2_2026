<h1>Usuários</h1>
<hr>
<div>
    <table class="table" style="top:40px;">
        <thead>
            <tr>
                <th>Descricao</th>
                <th>Foto</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th><a href="index.php?page=imovel">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //importa o UsuarioController.php
            require_once __DIR__ . '/../controller/ImovelController.php';
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
            $imoveis = call_user_func(array('ImovelController','listar'));

            //Verifica se houve algum retorno
            if (isset($imoveis) && !empty($imoveis)) {
                foreach ($imoveis as $imovel) {
                    ?>
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><?php echo $imovel->getFoto(); ?></td>
                        <td><?php echo $imovel->getValor(); ?></td>
                        <td><?php echo $imovel->getTipo(); ?></td>
                        <td>
                            <a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId(); ?>">Editar</a>
                            <a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

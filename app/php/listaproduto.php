<?php
include_once "../class/ClassProduto.php";
include_once "../dao/Produto.DAO.php";


$Produto = new ProdutoDAO();
$dados = $Produto->listaProduto();


if (isset($_POST['editaproduto'])) {

    echo "ok";
}

?>

<br><br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/produto/">Adicionar Produto</a>
</div>
<br><br>
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">CÓD SAP</th>
            <th scope="col">PRODUTO</th>
            <th scope="col">DESCRIÇÂO</th>
            <th scope="col">UNIDADE</th>
            <th scope="col" style="text-align: center;">DOCUMENTAÇÃO</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody style="background-color: #fff;">
        <?php

        foreach ($dados as $dado => $obj) {
        ?>

            <tr>
                <th scope="col" style="text-align: center;"><?php echo $obj->getSap(); ?></th>
                <th scope="col"><img src="../imagens/<?php echo $obj->getImg(); ?>" height="50" width="30"></th>
                <th scope="col"><?php echo $obj->getProduto(); ?></th>
                <th scope="col"><?php echo $obj->getUnidade(); ?></th>
                <th scope="col" style="text-align: center;"><a href="../pdf/<?php echo $obj->getFicha(); ?>">Ficha Técnica</a></th>
                <th scope="col"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger btn-sm" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>

            </tr>

            <div class="modal fade" id="editar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $obj->getID(); ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $obj->getProduto(); ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Imagem <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control form-control-sm" id="imagem" name="imagem" accept=".png, .jpg, .jpeg" placeholder="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Cód. SAP</label>
                                        <input type="text" class="form-control form-control-sm" id="sap" name="sap" placeholder="" value="<?php echo $obj->getSap(); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Descrição</label>
                                        <input type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="" value="<?php echo $obj->getProduto(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Unidade</label>
                                        <input type="text" class="form-control form-control-sm" id="unidade" name="unidade" placeholder="" value="<?php echo $obj->getUnidade(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Ficha Técnica</label>
                                        <input type="file" class="form-control form-control-sm" id="ficha" name="ficha" accept="application/pdf,application/vnd.ms-excel" placeholder="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="editaproduto" class="btn btn-primary">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        <?php
        }


        ?>


    </tbody>
</table>
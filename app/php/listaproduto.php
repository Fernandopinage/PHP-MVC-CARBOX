<?php
include_once "../class/ClassProduto.php";
include_once "../dao/Produto.DAO.php";


$Produto = new ProdutoDAO();
$dados = $Produto->listaProduto();


if (isset($_FILES['imagem']['name'])) {
    $imagem = $_FILES['imagem']['name'];


    $diretorio = '../imagens/';
    $diretorioPDF = '../pdf/';
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);
}
if (isset($_FILES['ficha']['name'])) {

    $ficha = $_FILES['ficha']['name'];
    move_uploaded_file($_FILES['ficha']['tmp_name'], $diretorioPDF . $ficha);
}
if (isset($_POST['editaproduto'])) {

    $ClassProduto = new ClassProduto();
    $ClassProduto->setID($_POST['id']);
    $ClassProduto->setImg($imagem);
    $ClassProduto->setProduto($_POST['desc']);
    $ClassProduto->setUnidade($_POST['unidade']);
    $ClassProduto->setFicha($ficha);



    $Produto = new ProdutoDAO();
    $Produto->editarProduto($ClassProduto);
}

?>

<br>
<link href='../css/table.css' rel='stylesheet' />
<br>

<div class="text-right">
    <a class="btn btn-primary" href="?p=add/produto/">Adicionar Produto</a>
</div>
<style>
.table-overflow {
    margin: 10px;
    max-height:440px;
    overflow-y:auto;
}

</style>
<div class="table-overflow">
<table class="table table-hover" style="overflow-x: scroll">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">CÓD SAP</th>
            <th scope="col">IMAGEM</th>
            <th scope="col">DESCRIÇÂO</th>
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
                <th scope="col" data-toggle="modal" data-target="#visualizar<?php echo $obj->getID(); ?>"><img src="../imagens/<?php echo $obj->getImg(); ?>" height="80" width="50" class="img-thumbnail"></th>
                <th scope="col"><?php echo $obj->getProduto(); ?></th>
                <th scope="col" style="text-align: center;"><a href="../pdf/<?php echo $obj->getFicha(); ?>" target="_blank" style="color:#FF5E14 ;">Ficha Técnica</a></th>
                <th scope="col"><button type="button" class="btn btn-success btn-sm" id="editarBTN" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger btn-sm" href="?produto/delete=<?php echo $obj->getID(); ?>">Excluir</a></th>

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
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="id" id="id" value="<?php echo $obj->getID(); ?>">
                                        <label for="inputEmail4">Imagem <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control form-control-sm is-invalid" id="imagem" name="imagem" accept=".png, .jpg, .jpeg" value="<?php echo $obj->getImg(); ?>" placeholder="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Cód. SAP</label>
                                        <input type="text" class="form-control form-control-sm is-invalid" id="sap" name="sap" placeholder="" value="<?php echo $obj->getSap(); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Descrição</label>
                                        <input type="text" class="form-control form-control-sm is-invalid" id="desc" name="desc" placeholder="" value="<?php echo $obj->getProduto(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Unidade</label>
                                        <input type="text" class="form-control form-control-sm is-invalid" id="unidade" name="unidade" placeholder="" value="<?php echo $obj->getUnidade(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Ficha Técnica</label>
                                        <input type="file" class="form-control form-control-sm is-invalid" id="ficha" name="ficha" target="_blank" accept="application/pdf,application/vnd.ms-excel" value="<?php echo $obj->getFicha(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>
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

            <div class="modal fade" id="visualizar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $obj->getID(); ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $obj->getProduto(); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="../imagens/<?php echo $obj->getImg(); ?>" height="400" width="350" class="img-thumbnail">
                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>

        <?php
        }


        ?>


    </tbody>
</table>
</div>
<script>
    $("#imagem").change(function() {

        if (document.getElementById('imagem').value != "") {
            $('#imagem').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#imagem').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });
    $("#sap").change(function() {

        if (document.getElementById('sap').value != "") {
            $('#sap').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#sap').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#desc").change(function() {

        if (document.getElementById('desc').value != "") {
            $('#desc').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#desc').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#ficha").change(function() {

        if (document.getElementById('ficha').value != "") {
            $('#ficha').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#ficha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });
</script>
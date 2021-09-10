<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassClienteProduto.php";



class ClienteProdutoDAO extends DAO{

    public function insertClienteProduto($ClassCliPro){

        $sql = "INSERT INTO `cliente_produto`(`cli_pro_id`, `cli_pro_cnpj`, `cli_pro_sap`, `cli_pro_produto`) VALUES (null, :cli_pro_cnpj, :cli_pro_sap, :cli_pro_produto)";
       
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':cli_pro_cnpj', $ClassCliPro->getCnpj());
        $insert->bindValue(':cli_pro_sap', $ClassCliPro->getSap());
        $insert->bindValue(':cli_pro_produto', json_encode($ClassCliPro->getProduto(),JSON_UNESCAPED_UNICODE));


        try {
            $insert->execute();
           ?>
           <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Produto(s)',
                    text:'adicionado(s) com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
           
           
           
           <?php

            header('Refresh: 3.5; url=home.php?p=cliente/');
            
        } catch (\Throwable $th) {
            
            ?>
            
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text:'ao adicionar o produto(s)',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
            
            <?php

            header('Refresh: 4.0; url=home.php?p=cliente/');
        }

    }

}


?>
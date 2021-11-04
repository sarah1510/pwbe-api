<?php

    ## Importação do arquivo cnexão ##
    include('connection.php');

    ## Função de leitura de dados (sem critério) ##
    function read($conn){
        $sql = "SELECT * FROM tbl_pessoa";

        if ($resultado = mysqli_query($conn, $sql)) {

            $dados = mysqli_fetch_all($resultado);

            echo json_encode(array("status" => "success", "data" => $dados));

        } else {
            
            echo json_encode(array("status" => "error", "data" => mysqli_error($conn)));
        }
    }
    
    
    ## Função de leitura de inserção ##
    function create($nome, $sobrenome, $email, $celular, $fotografia, $conn){

        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)
                VALUES ('$nome','$sobrenome','$email','$celular','$fotografia')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array( "status" => "success","data" => "Dados inseridos com sucesso"));
        } else {
            echo json_encode(array("status" => "error","data" => "Erro ao inserir os dados"));
        }
    }


?>
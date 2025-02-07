<?php

try {

    // Definindo direitório de destino.
    $diretorio_destino = "/App/View/Uploads/";

    // Verificando se diretorio de destino existe.
    if(!is_dir($diretorio_destino)) 
        throw new Exception("Diretório não encontrado.");

    // Caminho do novo arquivo no servidor.    
    $nome_arquivo_servidor = $diretorio_destino . "enviado.gif";

    // Movendo o arquivo temporario para o diretorio final.
    if(move_uploaded_file($_FILES["arquivo_up"]["tmp_name"], $nome_arquivo_servidor))
    {
        echo "Arquivo Enviado!";

    } else throw new Exception("Erro ao enviar. Erro: " . $_FILES["arquivo_up"]["error"]);      
     
} catch(Exception $e) {

    echo $e->getMessage();
}
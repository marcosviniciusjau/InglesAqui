<?php
try{
    $diretorio_destino = "/App/View/Uploads/";

    if(!is_dir($diretorio_destino))
    throw new Exception("Diretório não encontrado");


       if(is_executable($_FILES["arquivo_up"]["tmp_name"]))
       throw new Exception("Arquivos Executáveis não são permitidos");
      


       $ext_arquivo =pathinfo($_FILES["arquivo_up"]["name"], PATHINFO_EXTENSION  );    
       


       
       $nome_unico = uniqid("enviado_") . "." . $ext_arquivo;

       $nome_arquivo_servidor = UPLOADS . $nome_unico;







    if(move_uploaded_file($_FILES["arquivo_up"]["tmp_name"], $nome_arquivo_servidor))
    {
        echo "Arquivo Enviado!";
    } else throw new Exception("Erro ao enviar. Erro:" . $_FILES["arquivo_up"]["error"]);

} catch(Exception $e){
    echo $e->getMessage();
}
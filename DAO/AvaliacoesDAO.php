<?php
//As classes DAO são responsáveis por executar o SQL em conjunto com o banco de dados.
namespace App\DAO;

use App\Model\AvaliacoesModel;

use \PDO;
use \PDOException;
use \Exception;

class AvaliacoesDAO  extends DAO
{
    // Propriedade da classe que  armazenará o link de conexão com o banco de dados.



    public function __construct()
    {
        parent::__construct();
    }


    public function insert(AvaliacoesModel $model)
    {
        $sql = "INSERT INTO avaliacoes (qtde_estrelas) VALUES (?) ";

        $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->qtde_estrelas);
        $stmt->execute();
    }

}
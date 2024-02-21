<?php

namespace App\Controller;


use App\Model\ADMModel;

use App\DAO\ADMDAO;

use stdClass;
use Exception;

class ADMController extends Controller
{
    
public static function meusDados()
    {
        $model = new ADMModel();
        $model->getAllRows();
        $ADM_dao = new ADMDAO();
        $meus_dados = $ADM_dao->getMyUserById(LoginADMController::getIdOfCurrentUser());
        if(isset($_GET['success']))
        {
            $retorno['positivo'] = "Dados alterados com sucesso!";
        }
        if(isset($_GET['wrongpassword']))
        {
            $retorno['senha_incorreta'] = "Senha incorreta. As alterações não foram salvas.";
        }
        if(isset($_GET['wrongpasswordconfirmacation']))
        {
            $retorno['senha_confirmacao_incorreta'] = "A confirmação da nova senha não confere com a nova senha.";
        }
        
        require PATH_VIEW . 'modules/TelaADM/meus-dados-adm.php';
    
    }
    public static function meusDadosSalvar()
    {
         parent::isAuthenticated();
        // Verificando se o usuário colocou a senha atual correta
        if (self::checkCurrentUserPassword($_POST['senha_atual_adm'])) 
        {
            // Verificar se o usuário quer alterar a senha
            if(!empty($_POST['nova_senha_adm']))
            {
                if($_POST['nova_senha_adm'] == $_POST['confirmacao_nova_senha_adm'])
                {
                    $nova_senha_adm = $_POST['nova_senha_adm'];
                } else {
                    header("Location: /adm/meus-dados-adm?wrongpasswordconfirmacation=true");
                }
            }
            $ADM_dao = new ADMDAO();
            $dados_para_salvar =  $ADM_dao;
            $ADM_dao->id =  $_POST['id'];
          
            $ADM_dao->email_adm = $_POST['email_adm'];
            $ADM_dao->senha_adm =isset($nova_senha) ? $nova_senha_adm : $_POST['senha_atual_adm'];
            $ADM_dao->update($dados_para_salvar);
            header("Location: /TelaADM/tela-adm.php");
    
    
            $ADM_dao->update($dados_para_salvar);
          
            header("Location: /adm/meus-dados-adm?success=true");            
        } else 
            header("Location: /adm/meus-dados-adm?wrongpassword=true");
    }


    private static function checkCurrentUserPassword($password)
    {
        parent::isAuthenticated();
        
        $ADM_dao = new ADMDAO();

        $retorno = $ADM_dao->checkUserByIdAndPassword(LoginADMController::getIdOfCurrentUser(), $password);

        return (is_object($retorno)) ? true : false;
    }
}
<?php
/**
 * @author Wagner
 */
class ConexaoPostgreSQL extends FactoryConnectionBD{
    
    public function __construct(
                                  $host
                                , $dbname
                                , $user
                                , $senha
                                )
    {
        parent::__construct(
                                        $host
                                      , $dbname
                                      , $user
                                      , $senha);    
        $pdo = new PDO(
                                "pgsql:host= $host; "
                              . "dbname    = $dbname;" , "$user", "$senha");

        $this->conexao = $pdo;
    
    }
    
    public function getConexao()
    {
        if(!is_null($this->conexao)){
             return $this->conexao;
        }
    }
}

<?php
/**
 * @author Wagner
 */
abstract class FactoryConnectionBD {
    // 
    protected $conexao;
    abstract public function __construct(
                                  $host
                                , $dbname
                                , $user
                                , $senha);
        
    abstract public function getConexao();
}

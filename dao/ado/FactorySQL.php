<?php
/**
 * @author Wagner
 */
abstract class FactorySQL {
    // 
    protected $sql;
    abstract public function __construct(
                                  $method
                                , $table
                                , $columns
                                , $valores);
        
    abstract public function getSQL();
}

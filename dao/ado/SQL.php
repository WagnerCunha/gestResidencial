<?php
/**
 * @author Wagner Cunha <john.doe@example.com>
 */
class SQL extends FactorySQL{
    /**
     * @method construtor
     */
    public function __construct($method
                                , $table
                                , $columns
                                , $valores)
    {
        $this->sql   = $this->__getStringSQL($method, 
                                  $table
                                , $columns
                                , $valores);
        return $this->sql;
    }
    /**
     * @version "0.1"
     */ 
    public function getSQL()
    {
        if(!is_null($this->sql)){
             return $this->sql;
        }
    }
    private function __getStringSQL($method
                                , $table
                                , $columns
                                , $valores)
    {
        try{
            if(!is_null($method)
                    && is_string($method) 
                    && !empty($method)){
                
                switch ("$method") 
                {
                    case "SELECT":
                        return $this->geraSelectPDO($table
                                , $columns
                                , $valores);
                        break;
                    case "UPDATE":
                        return $this->geraUpdatePDO($table
                                , $columns
                                , $valores);
                        break;
                    case "INSERT":
                        return $this->geraInsertPDO($table
                                , $columns
                                , $valores);
                        break;
                    case "DELETE":
                        return $this->geraDeleteWithWherePDO($table
                                , $columns
                                , $valores);
                        break;

                    default:
                        break;
                }
            }
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
          
         
    
    }
     /**
     * @method DELETE
     */
    private function geraDeleteWithWherePDO($tabela
                                , $coluna
                                , $valor
                      )
    {
        try{
            if(!is_null($tabela)
                    && is_string($tabela)
                    && !empty($tabela))
            {
                if(!is_null($coluna)
                        && !empty($coluna)
                        )
                {
                    if(!is_null($valor)
                        && !empty($valor)
                        )
                    {
                        $sql = " DELETE FROM ";
                        $sql .= $tabela ;
                        $sql .= " WHERE $coluna = $valor";


                        return $sql;
                    }else{
                        throw new Exception("");
                    }
                }else{
                    throw new Exception("");
                }
            }else{
                throw new Exception("");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
     /**
     * @method SELECT WITH WHERE
     */

    private function geraSelectWithWherePDO(
                                      $tabela
                                    , $coluna
                                    , $valor
                                )
    {
        try{
            if(!is_null($tabela)
                    && is_string($tabela)
                    && !empty($tabela))
            {
                if(!is_null($coluna)
                        && !empty($coluna)
                        )
                {
                    if(!is_null($valor)
                        && !empty($valor)
                        )
                    {
                        $sql = " SELECT * FROM ";
                        $sql .= $tabela ;
                        $sql .= " WHERE $coluna = $valor";


                        return $sql;
                    }else{
                        throw new Exception("");
                    }
                }else{
                    throw new Exception("");
                }
            }else{
                throw new Exception("");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
     /**
     * @method SELECT
     */
    private function geraSelectPDO($tabela)
    {
        try{
            if(!is_null($tabela)
                    && is_string($tabela)
                    && !empty($tabela))
            {
                $sql = "";
                $sql .= "SELECT * FROM $tabela";

                return $sql;
            }
        } catch (Exception $ex) {
            throw $ex;
        }

    }
    /**
     * @method UPDATE
     */
    private function geraUpdatePDO($tabela
                                        , $colunas
                                        , $valores) 
    {
        $aux = "";
        $expressao = array();
        try {
            if (!is_null($tabela) && is_string($tabela) && !empty($tabela)) {
                if (!is_null($colunas) && is_array($colunas) && !empty($colunas))
                 {
                    if (!is_null($valores) && is_array($valores) && !empty($valores)
                    ) {
                        $sql = "UPDATE ";
                        $sql .= $tabela . " SET ";

                        for ($index = 0; $index <= (count($valores) - 1); $index++) {
                            $aux = $colunas[$index] . " = " . $valores[$index];
                            $expressao[] = $aux;
                        }

                        $sql = $sql . implode($expressao, " , ");

                        return $sql;
                    } else {
                        throw new Exception("");
                    }
                } else {
                    throw new Exception("");
                }
            } else {
                throw new Exception("");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    /**
     * @method INSERT
     */
    private function geraInsertPDO($tabela 
                                        , $colunas
                                        , $valores
                                   )
    {
        try
        {
            if(!is_null($tabela)
                    && is_string($tabela)
                    && !empty($tabela))
            {
                if(!is_null($colunas)
                        && is_array($colunas)
                        && !empty($colunas)
                        )
                {
                    if(!is_null($valores)
                        && is_array($valores)
                        && !empty($valores)
                        )
                    {
                        $sql = "INSERT INTO ";
                        $sql .= $tabela . " (";
                        $sql .= implode( ' , ' , $colunas) . " ) VALUES ( ";
                        $sql .= implode( ' , ' , $valores) . " ) ";

                        return $sql;
                    }else{
                        throw new Exception("");
                    }
                }else{
                    throw new Exception("");
                }
            }else{
                throw new Exception("");
            }

        } catch (Exception $ex) {
            throw $ex;
        }
    }

}

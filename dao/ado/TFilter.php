<?php
/**
 * @author Wagner
 */
class TFilter extends TExpression {
    private $variable; // coluna
    private $operator; // operador
    private $value;    // valor
    
    public function __construct($variable
                                    ,$operator
                                    ,$value) 
    {
                                        $this->variable = $variable;
                                        $this->operator = $operator;
                                        $this->value    = $this->transform($value);
    }
    
    private function transform($value)
    {
        if(is_array($value))
        {
            foreach ($value as $x) {
                if(is_integer($x))
                {
                    $foo[] = $x;
                }
                else if(is_string($x))
                {
                    $foo[] = "'$x'";
                }
            }
            $result = '(' . implode(',', $foo) . ')';
        }else if(is_string($value)) {
            $result = "'$value'";
        }else if(is_null($value)){
            $result = NULL;
        }else if(is_bool($value)){
            $result = $value ? 'TRUE' : 'FALSE';
        }else{
            $result = $value;
        }
        
        return $result;
    }
    
    public function dump()
    {
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}

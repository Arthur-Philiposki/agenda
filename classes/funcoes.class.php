<?php
class funcoes {
    public function dtNasc($vlr, $tipo){
        switch ($tipo){
            case 1:
                $rst = implode("-", array_reverse(explode("/",$vlr))); //converte data BR internacional
                break;

            case 2:
                $rst = implode("/", array_reverse(explode("-",$vlr))); // inernacional para BR
                break;
        }
        return $rst;
    }

    //novas funcoes
}
?>
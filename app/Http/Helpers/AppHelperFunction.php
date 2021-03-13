<?php

class AppHelperFunction
{
    /**
     * formata número para moeda 0,00 para ser usado nas views
     * @param  [type]  $number        [Número que desejamos formatar]
     * @param  integer $decimals [Número de casas decimais - padrao é 2]
     * @param  string $dec_point [separador de centavos]
     * @param  string $thousands_sep [separador de milhar]
     * @return [type]                 [Número formatado]
     */
    public static function formatReal($number, $decimals = 2, $dec_point = ',', $thousands_sep = '.')
    {
        if (!empty($number)) {
            return number_format($number, $decimals, $dec_point, $thousands_sep);
        } else {
            return number_format(0, $decimals, $dec_point, $thousands_sep);
        }
    }


    //faz o tratamento de um campo datetime para BR
    public static function formatDateTimeBR($data = NULL)
    {
        if ($data) :
            $d = new DateTime($data);
            return $d->format('d/m/Y \à\s H:i:s');
        else :
            return date('Y-m-d H:i:s');
        endif;
    }

    //faz o tratamento de um campo datetime para BR
    public static function formatDateTimeBRUniversal($data = NULL)
    {
        if ($data) :
            $d = new DateTime($data);
            return $d->format('d/m/Y H:i:s');
        else :
            return date('Y-m-d H:i:s');
        endif;
    }

    //faz o tratamento de um campo datetime para ser inserido no banco
    public static function formatDateTimeDB($data = NULL)
    {
        if ($data != NULL) :
            $array = explode("/", $data);
            $rev = array_reverse($array);
            $date = implode("-", $rev);
            return $date;
        else :
            return date('Y-m-d H:i:s');
        endif;
    }

    //faz o tratamento de um campo date sem hora para DB
    public static function formatDateDB($data = NULL)
    {
        if ($data != NULL) :
            $array = explode("/", $data);
            $rev = array_reverse($array);
            $date = implode("-", $rev);
            return $date;
        else :
            return date('Y-m-d');
        endif;
    }

    //faz o tratamento de um campo date para pt_BR
    public static function formatDateBR($data = NULL)
    {
        if ($data) :
            $d = new DateTime($data);
            return $d->format('d/m/Y');
        else :
            return null;
        endif;
    }
}

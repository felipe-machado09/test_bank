<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Modules\Transaction\Entities\Actions\CheckUserCanTransactionAction;


class Helpers
{

    public static function maskPhone($val, $mask = '(##) #### ####') {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    public static function maskCellPhone($val, $mask = '(##) ##### ####') {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public static function maskCpf($val, $mask = '###.###.###-##') {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public static function maskCnpj($val, $mask = '##.###.###/####-##') {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    public static function maskMoney($val) {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return number_format($maskared, 2, ",", ".");
    }
    public static function maskDate($val) {
        return date('d/m/Y', strtotime($val));
    }

    public static function maskHour($val) {
        return date('H:i', strtotime($val));
    }

    public static function maskText($val, $limit=150, $strip = false) {
        $str = ($strip == true)?strip_tags($val):$val;
        if (strlen ($str) > $limit) {
            $str = substr ($str, 0, $limit - 3);
            return (substr ($str, 0, strrpos ($str, ' ')).'...');
        }
        return trim($str);
    }








}


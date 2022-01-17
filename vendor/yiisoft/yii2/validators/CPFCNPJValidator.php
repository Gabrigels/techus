<?php
namespace yii\validators;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/*
 * CPFCNPJValidator
 * @autor: Robson Kades
 * @email: telecantu@gmail.com
 * Valida se o CPF ou CNPJ é válido.
 */

class CPFCNPJValidator extends Validator {

    public function validateAttribute($object, $attribute) {
        if (!$this->validaCPF($object->$attribute))
        if (!$this->validaCNPJ($object->$attribute))
            $this->addError($object, $attribute, Yii::t('yii', '{attribute} não é válido.'));
    }

    public function clientValidateAttribute($object, $attribute) {
        ValidationAsset::register($view);
        if ($this->enableIDN) {
            PunycodeAsset::register($view);
        }
        $options = $this->getClientOptions($model, $attribute);

        return 'yii.validation.email(value, messages, ' . Json::htmlEncode($options) . ');';

    }
    /*
     * @autor: Rodrigo S Nurmberg
     * @email: rsn86@rsn86.com
     * Função que valida o CNPJ
     */
    private function validaCNPJ($cnpj) {
        $cnpj = str_pad(preg_replace('/[^0-9_]/', '', $cnpj), 14, '0', STR_PAD_LEFT);
        for ($x = 0; $x < 10; $x++)
            if ($cnpj == str_repeat($x, 14))
                return false;
        if (strlen($cnpj) != 14) {
            return false;
        } else {
            for ($t = 12; $t < 14; $t++) {
                $d = 0;
                $c = 0;
                for ($m = $t - 7; $m >= 2; $m--, $c++) {
                    $d += $cnpj{$c} * $m;
                }
                for ($m = 9; $m >= 2; $m--, $c++) {
                    $d += $cnpj{$c} * $m;
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cnpj{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    /*
     * função validaCPF
     * @autor: Moacir SelÃ­nger Fernandes
     * @email: hassed@hassed.com
     * Qualquer dÃºvida Ã© sÃ³ mandar um email
     * http://codigofonte.uol.com.br/codigo/php/validacao/validacao-de-cpf-com-php
     * 
    */    
    
    private function validaCPF($cpf) {
        $cpf = str_pad(preg_replace('/[^0-9_]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        for ($x = 0; $x < 10; $x++)
            if ($cpf == str_repeat($x, 11))
                return false;
        if (strlen($cpf) != 11) {
            return false;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

}

?>

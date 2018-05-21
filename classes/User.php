<?php
/**
 * Created by PhpStorm.
 * User: Naifish Ali
 * Date: 2018-05-20
 * Time: 9:59 AM
 */

class User
{
    private $firstName,$lastName,$email,$pass,$confPass,$street,$postal;

    public function _set($property,$value){
        if (property_exists($this, $property)) {
            $this->$property=$value;
        }
    }

    public function _get($property){
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function signUp(){}

    public function logIn(){}
}
<?php

Class Execs
{
    public function tratar(Exception $e)
    {
        if(DEBUG){
            print_r($e);
        }else{
            $e->getMessage();
        }
        exit;
    }
}
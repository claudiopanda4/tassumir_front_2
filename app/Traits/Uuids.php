<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids 
{
   /** 
     * Função de inicialização do Laravel. 
     */ 
    protected static function boot () 
    { 
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        }); 
    }
   /** 
     * Obtenha o valor que indica se os IDs estão aumentando. 
     * 
     * @return bool 
     */ 
    public function getIncrementing () 
    { 
        return false; 
    }
   /** 
     * Obtenha o tipo de chave de incremento automático. 
     * 
     * @return string 
     */ 
    public function getKeyType () 
    { 
        return 'string'; 
    } 
}
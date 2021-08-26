<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Order extends Model
{
    use AutoNumberTrait;
    
    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function getAutoNumberOptions()
{
    return [
        'code' => [
            'format' => function () {
                return date('Y.m.d') . '/' . $this->branch . '/?'; 
            },
        'length' => 5,
        ]
    ];
}
}

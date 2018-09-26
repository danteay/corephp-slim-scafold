<?php

namespace Base;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $table;

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
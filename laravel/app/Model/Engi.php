<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Engi extends Model
{
    use SoftDeletes;

    protected $table = 'engis';

    protected $dates = ['deleted_at'];

    /**
     * 新規作成
     *
     * @param object $create_data
     * @return void
     */
    public function insertEngi(object $create_data): void
    {
        $this->title = $create_data->title;
        $this->save();
    }
}

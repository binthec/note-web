<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Engi extends Model
{
    use SoftDeletes;

    protected $table = 'engis';

    protected $dates = ['deleted_at'];

    protected $perPage = 5;

    /**
     * 新規作成
     *
     * @param object $create_data
     * @return void
     * @throws \Exception
     */
    public function insertEngi(object $create_data): void
    {
        $this->uuid = Uuid::uuid4();
        $this->title = $create_data->title;
        $this->save();
    }

    /**
     * 編集
     *
     * @param object $update_data
     * @return void
     */
    public function updateEngi(object $update_data): void
    {
        $this->title = $update_data->title;
        $this->update();
        $this->touch();
    }
}

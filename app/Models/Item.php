<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'items';

    protected $dates = ['deleted_at'];

    // protected $perPage = 100; // js 側で操作しているのでここでは設定しない

    /**
     * 新規作成
     *
     * @param object $create_data
     * @return void
     * @throws \Exception
     */
    public function insertItem(object $create_data): void
    {
        $this->uuid = Uuid::uuid4();
        $this->user_id = Auth::user()->id;

        $this->title = $create_data->title;

        $this->updated_by = Auth::user()->id;

        $this->save();
    }

    /**
     * 編集
     *
     * @param object $update_data
     * @return voids
     */
    public function updateItem(object $update_data): void
    {
        $this->title = $update_data->title;
        $this->updated_by = Auth::user()->id;

        $this->update();
        $this->touch();
    }
}

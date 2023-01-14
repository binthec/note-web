<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Engi extends Model
{
    use SoftDeletes;

    protected $table = 'engis';

    protected $dates = ['deleted_at'];

    // protected $perPage = 100; // js 側で操作しているのでここでは設定しない

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
        $this->user_id = Auth::user()->id;

        $this->title = $create_data->title;
        $this->item_num = $create_data->item_num;
        $this->content_data = json_encode($create_data->content_data);
        $this->first_cate = $create_data->first_cate;
        $this->content_data = $create_data->content_data;

        $this->updated_by = Auth::user()->id;

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
        $this->item_num = $update_data->item_num;
        $this->first_cate = $update_data->first_cate;
        $this->content_data = json_encode($update_data->content_data);

        $this->updated_by = Auth::user()->id;

        $this->update();
        $this->touch();
    }
}

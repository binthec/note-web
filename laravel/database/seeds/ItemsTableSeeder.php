<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Common\ItemCategoryCode;
use App\Common\ItemData;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 初期化して実行
        DB::table('items')->truncate();


        $item_result = [];

        foreach (ItemData::getItems() as $first_cate => $second_cate_items){

            foreach($second_cate_items as $second_cate  => $third_cate_items){

                if(in_array($second_cate, ItemCategoryCode::$has_no_third_category)){
                    // 小項目がない場合
                    foreach($third_cate_items as $num => $item){
                        $item_result[] = [
                            'uuid' =>
                                $first_cate . '-' .
                                str_pad($second_cate, 2, 0, STR_PAD_LEFT) .
                                '-00-' .
                                str_pad($num, 2, 0, STR_PAD_LEFT),
                            'user_id' => 5,
                            'title' => $item['name'],
                            'first_cate' => $first_cate,
                            'second_cate' => $second_cate,
                            'third_cate' => null,
                            'note_order' => $num,
                            'file_path' => $item['file_path'],
                            'created_at' => now(),
                        ];
                    }
                }else{
                    // 小項目がある場合
                    foreach($third_cate_items as $third_cate => $items){
                        foreach($items as $num => $item){
                            $item_result[] = [
                                'uuid' =>
                                    $first_cate . '-' .
                                    str_pad($second_cate, 2, 0, STR_PAD_LEFT) . '-'.
                                    str_pad($third_cate, 2, 0, STR_PAD_LEFT) .'-' .
                                    str_pad($num, 2, 0, STR_PAD_LEFT),
                                'user_id' => 5,
                                'title' => $item['name'],
                                'first_cate' => $first_cate,
                                'second_cate' => $second_cate,
                                'third_cate' => $third_cate,
                                'note_order' => $num,
                                'file_path' => $item['file_path'],
                                'created_at' => now(),
                            ];
                        }
                    }
                }
            }
        }

        DB::table('items')->insert($item_result);
    }
}

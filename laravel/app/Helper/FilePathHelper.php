<?php

namespace App\Helper;

use App\Common\ItemCategoryCode;
use Illuminate\Support\Facades\Log;

class FilePathHelper {

    /**
     *
     *
     * @return mixed|string|null
     */
    public static function getItemFilePath($item, $ext = '.svg')
    {
        $url = storage_path('items/');

        $url .= ItemCategoryCode::$first_category_dir_labels[$item->first_cate];
        $url .= '/' . $item->uuid . $ext;

        return $url;
    }

}

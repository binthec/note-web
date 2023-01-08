<?php

namespace App\Http\Controllers\Api;

use App\Common\HttpStatusCode;
use App\Common\ItemCategoryCode;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * 一覧
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {

        $query = Item::query();

        // ソート順が渡された場合に並び順をクエリに加える
        if($request->order_column && $request->order){
            $query->orderBy($request->order_column, $request->order);
        }

        $list = $query->paginate($request->per_page);

        // Log::info($list);

        return response()->json([
            'message' => 'success',
            'list' => $list,
        ], HttpStatusCode::OK);
    }

    /**
     * 登録
     *
     * @param ItemRequest $request
     * @return JsonResponse
     */
    public function store(ItemRequest $request): JsonResponse
    {
        $entity = new Item();
        $request->item = json_decode($request->item);

        DB::beginTransaction();

        try {

            $entity->insertItem($request->item);

            DB::commit();
            return response()->json(['message' => 'success'], HttpStatusCode::CREATED);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => new MessageBag(json_decode($e->getMessage(), true))
            ], HttpStatusCode::VALIDATION_ERROR
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['message' => 'success'], HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 編集
     *
     * @param ItemRequest $request
     * @param string $uuid
     * @return JsonResponse
     */
    public function update(ItemRequest $request, string $uuid): JsonResponse
    {
        $request->item = json_decode($request->item);

        $entity = Item::query()->where('uuid', $uuid)->firstOrFail();

        DB::beginTransaction();

        try{
            $entity->updateItem($request->item);

            DB::commit();
            return response()->json(['message' => 'success'], HttpStatusCode::OK);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => new MessageBag(json_decode($e->getMessage(), true))
            ], HttpStatusCode::VALIDATION_ERROR
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['message' => 'success'], HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 単一のレコードを返す
     *
     * @param string $uuid
     * @return JsonResponse
     */
    public function show(string $uuid): JsonResponse
    {
        $entity = Item::query()->where('uuid', $uuid)->firstOrFail();

        return response()->json([
            'message' => 'success',
            'item' => $entity
        ], HttpStatusCode::OK);
    }

    public function getCategories(): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'first_categories' => ItemCategoryCode::$first_categories,
        ], HttpStatusCode::OK);
    }
}

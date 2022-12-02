<?php

namespace App\Http\Controllers\Api;

use App\Common\HttpStatusCode;
use App\Http\Requests\EngiRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use App\Model\Engi;

class EngiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    /**
     * 登録
     *
     * @param Engi $request
     * @return JsonResponse
     */
    public function store(EngiRequest $request): JsonResponse
    {
        $engi = new Engi();
        $request->engi = json_decode($request->engi);

        DB::beginTransaction();

        try {

            $engi->insertEngi($request->engi);

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

    public function update()
    {
        return view('engi.edit');
    }
}

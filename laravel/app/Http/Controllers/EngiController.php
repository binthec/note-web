<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class EngiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('engi.list');
    }

    /**
     * 新規作成画面
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('engi.create');
    }

    /**
     * 編集画面
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(string $uuid)
    {
        return view('engi.edit', compact('uuid'));
    }

    /**
     * プレビュー画面表示
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function preview(Request $request): Response
    {
        $pdf = \PDF::loadView('engi/output_pdf', ['engi' => json_decode($request->engi)]);
        $pdf->setPaper('A4');

        return $pdf->stream();
    }
}

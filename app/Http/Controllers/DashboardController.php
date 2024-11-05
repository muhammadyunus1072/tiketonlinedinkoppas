<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\Data\DataRepository;

class DashboardController extends Controller
{
    public function index()
    {
        return view('app.layouts.panel');
    }

    public function setData()
    {
        return view('app.data.index');
    }

    public function getData()
    {
        $data = DataRepository::find(1);

        return response()->json($data->data);
    }

    public function webhook(Request $request)
    {
        Log::info($request->all());
    }

}

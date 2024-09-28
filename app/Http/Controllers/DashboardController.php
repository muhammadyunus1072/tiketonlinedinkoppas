<?php

namespace App\Http\Controllers;

use Exception;
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
        return "OKE";
        return view('app.data.index');
    }

    public function getData()
    {
        $data = DataRepository::find(1);

        return response()->json([
            'message' => $data->data,
        ]);
    }

}

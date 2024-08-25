<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Models\PesertaCareerFest;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use App\Imports\PesertaCareerFestImport;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Repositories\Page\PesertaCareerFestRepository;

class PageController extends Controller
{
    // Excel::import(new PesertaCareerFestImport, public_path('data.xlsx'));
    public function index()
    {

        return view('app.page.index');
    }

    public function register()
    {
        return view('app.page.register');
    }

    public function edit(Request $request)
    {
        return view('app.account.role.detail', ["objId" => $request->id]);
    }

    public function scanner()
    {
        return view('app.page.scanner');
    }

    public function attendance()
    {
        return view('app.page.attendance.index');
    }

    public function generate($id)
    {
        try {
            $decId = Crypt::decrypt($id);
            $user = PesertaCareerFestRepository::find($decId);
            if($user && $user->status === PesertaCareerFest::STATUS_REGISTERED){
                $qrCode = QrCode::size(400)->generate($id);
                return $qrCode;
                return view('app.page.qrcode', compact('qrCode', 'id'));
            }
            return 'Data Tidak Ditemukan';
        } catch (DecryptException $e) {
            return 'Data Tidak Ditemukan';
        }
        
    }
}

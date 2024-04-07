<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Models\ConcertParticipant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Page\ConcertParticipantRepository;

class PageController extends Controller
{
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
        $decId = Crypt::decrypt($id);
        $user = ConcertParticipantRepository::find($decId);
        if($user && $user->status === ConcertParticipant::STATUS_REGISTERED){
            $qrCode = QrCode::size(300)->generate($id);
            return view('app.page.qrcode', compact('qrCode', 'id'));
        }
        return 'Data Tidak Ditemukan';
        
    }
}

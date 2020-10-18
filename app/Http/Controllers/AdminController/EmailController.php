<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // kalau controleer masuk ke dalam folder jangan lupa use yg di sebelah ini
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {



        $title = 'Kirim Email';
        return view('admin/page/fileEmail/view', ['title' => $title]);
    }

    public function sendingEmail(Request $req)
    {
        $file =  $req->file('foto');

        if (empty($file)) {
            $details = [

                'title' => $req->title,
                'pesan' => $req->pesan,
                'foto'  => null

            ];

            $mail = Mail::to($req->to)->send(new SendMail($details));
            //disina saya mencoba vardump $mail hasil nyaa null, seharusnya kalau berhasil true, tapi entah kenapa mail ini berhasil, menghasilkan null, oleh karna itu saya membuat logik jika mail = null berarti sukses
            if ($mail == null) {
                session()->flash('email', 'Berhasil Mengirim Email');
            } else {
                session()->flash('email', 'Gagal Mengirim Email');
            };

            return back();
        } else {
            $details = [

                'title' => $req->title,
                'pesan' => $req->pesan,
                'foto'  => $file
            ];

            $mail = Mail::to($req->to)->send(new SendMail($details));

            if ($mail == null) {
                session()->flash('email', 'Berhasil Mengirim Email Dengan File');
            } else {
                session()->flash('email', 'Gagal Mengirim Email Dengan File');
            };

            return back();
        }
    }
}

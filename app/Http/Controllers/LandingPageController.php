<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;
use App\Models\ProfilProdi;
use App\Models\DokumenKurikulum;
use App\Models\Sop;
use App\Models\TenagaAhli;
use App\Models\KoleksiJurnal;

class LandingPageController extends Controller {
    public function index() {
        $visiMisi = VisiMisi::latest()->first();
        $profilProdi = ProfilProdi::all();
        $dokumenKurikulum = DokumenKurikulum::all();
        $sop = Sop::all();
        $tenagaAhli = TenagaAhli::all();
        $koleksiJurnal = KoleksiJurnal::all();

        return view('landingpage.index', compact(
            'visiMisi',
            'profilProdi',
            'dokumenKurikulum',
            'sop',
            'tenagaAhli',
            'koleksiJurnal'
        ));
    }
}
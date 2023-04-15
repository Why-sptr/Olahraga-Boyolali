<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\SepakBola;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function jumlah()
    {
        $baskets_atlet = Basket::where('level_cabor', 'atlet')->count();
        $sepak_bolas_atlet = SepakBola::where('level_cabor', 'atlet')->count();
        $total_atlet = $baskets_atlet + $sepak_bolas_atlet;

        $baskets_pelatih = Basket::where('level_cabor', 'pelatih')->count();
        $sepak_bolas_pelatih = SepakBola::where('level_cabor', 'pelatih')->count();
        $total_pelatih = $baskets_pelatih + $sepak_bolas_pelatih;

        $baskets_atlet = Basket::where('level_cabor', 'atlet')->count();
        $sepak_bolas_atlet = SepakBola::where('level_cabor', 'atlet')->count();

        $baskets_pelatih = Basket::where('level_cabor', 'pelatih')->count();
        $sepak_bolas_pelatih = SepakBola::where('level_cabor', 'pelatih')->count();

        return view('homepage', compact('total_atlet','total_pelatih','baskets_atlet','sepak_bolas_atlet','baskets_pelatih','sepak_bolas_pelatih'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use PDF;

class BasketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $olahraga = Basket::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } elseif ($request->has('atlet')) {
            $olahraga = Basket::where('level_cabor', 'atlet')->get();
        } elseif ($request->has('pelatih')) {
            $olahraga = Basket::where('level_cabor', 'pelatih')->get();
        } else {
            $olahraga = Basket::get();
        }

        return view('pusat/basket', ['olahraga' => $olahraga]);
    }


    public function index2()
    {
        $olahraga = Basket::all();
        return response()->json([
            'status' => "success",
            "data" => $olahraga,
        ]);
    }

    public function exportpdf()
    {
        $olahraga = Basket::where('level_cabor', 'atlet')
            ->get();

        view()->share('olahraga', $olahraga);
        $pdf = PDF::loadview('databasket-pdf');

        return $pdf->download('databasket.pdf');
    }

    public function tambahbasket()
    {
        return view('admin/tambahdatawalikelas');
    }

    public function insertbasket(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nama' => 'required',
            'nik' => 'required|integer',



        ]);
        $olahraga = Basket::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobasket/', $request->file('foto')->getClientOriginalName());
            $olahraga->foto = $request->file('foto')->getClientOriginalName();
            $olahraga->save();
        }
        return redirect()->route('basket')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $olahraga = Basket::find($id);
        return view('admin/tampilkanwalikelas', compact('olahraga'));
    }

    public function updatedatabasket(Request $request, $id)
    {

        $olahraga = Basket::find($id);
        $olahraga->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobasket/', $request->file('foto')->getClientOriginalName());
            $olahraga->foto = $request->file('foto')->getClientOriginalName();
            $olahraga->save();
        }
        return redirect()->route('basket')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $olahraga = Basket::find($id);
        $olahraga->delete();
        return redirect()->route('basket')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $olahraga = Basket::onlyTrashed()->get();
        return view('admin/trashwali', ['olahraga' => $olahraga]);
    }

    public function restore($id)
    {
        $olahraga = Basket::onlyTrashed()->where('id', $id);
        $olahraga->restore();
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $olahraga = Basket::onlyTrashed();
        $olahraga->restore();

        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $olahraga = Basket::onlyTrashed()->where('id', $id);
        $olahraga->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $olahraga = Basket::onlyTrashed();
        $olahraga->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}

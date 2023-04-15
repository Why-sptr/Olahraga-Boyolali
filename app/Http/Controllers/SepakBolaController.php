<?php

namespace App\Http\Controllers;

use App\Models\SepakBola;
use Illuminate\Http\Request;
use PDF;

class SepakBolaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $olahraga = SepakBola::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } elseif ($request->has('atlet')) {
            $olahraga = SepakBola::where('level_cabor', 'atlet')->get();
        } elseif ($request->has('pelatih')) {
            $olahraga = SepakBola::where('level_cabor', 'pelatih')->get();
        } else {
            $olahraga = SepakBola::get();
        }

        return view('pusat/bola', ['olahraga' => $olahraga]);
    }


    public function index2()
    {
        $olahraga = SepakBola::all();
        return response()->json([
            'status' => "success",
            "data" => $olahraga,
        ]);
    }

    public function exportpdf()
    {
        $olahraga = SepakBola::where('level_cabor', 'atlet')
            ->get();

        view()->share('olahraga', $olahraga);
        $pdf = PDF::loadview('databola-pdf');

        return $pdf->download('databola.pdf');
    }

    public function tambahbola()
    {
        return view('admin/tambahdatawalikelas');
    }

    public function insertbola(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nama' => 'required',
            'nik' => 'required|integer',



        ]);
        $olahraga = SepakBola::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobola/', $request->file('foto')->getClientOriginalName());
            $olahraga->foto = $request->file('foto')->getClientOriginalName();
            $olahraga->save();
        }
        return redirect()->route('bola')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $olahraga = SepakBola::find($id);
        return view('admin/tampilkanwalikelas', compact('olahraga'));
    }

    public function updatedatabola(Request $request, $id)
    {

        $olahraga = SepakBola::find($id);
        $olahraga->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobola/', $request->file('foto')->getClientOriginalName());
            $olahraga->foto = $request->file('foto')->getClientOriginalName();
            $olahraga->save();
        }
        return redirect()->route('bola')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $olahraga = SepakBola::find($id);
        $olahraga->delete();
        return redirect()->route('bola')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $olahraga = SepakBola::onlyTrashed()->get();
        return view('admin/trashwali', ['olahraga' => $olahraga]);
    }

    public function restore($id)
    {
        $olahraga = SepakBola::onlyTrashed()->where('id', $id);
        $olahraga->restore();
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $olahraga = SepakBola::onlyTrashed();
        $olahraga->restore();

        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $olahraga = SepakBola::onlyTrashed()->where('id', $id);
        $olahraga->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $olahraga = SepakBola::onlyTrashed();
        $olahraga->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}

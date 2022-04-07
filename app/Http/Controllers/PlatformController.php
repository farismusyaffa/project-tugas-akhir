<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Platform;
use App\Models\Fasilitator;
use App\Models\User;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use App\Models\Indikator;
use App\Models\DataIndikator;
use App\Models\Pelanggan;
use App\Models\InteraksiPltoPel;
use App\Models\InteraksiPeltoPl;
use App\Models\InteraksiPeltoPel;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    public function index()
    {
        return view('klien.berandaklien',[
            'title' => 'Beranda',
            'platforms' => Platform::where('user_id', auth()->user()->id)->orderBy('updated_at','DESC')->get(),
            'fasilitator' => Fasilitator::all()
        ]);
    }

    public function indexFasilitator()
    {
        
        return view('fasilitator.berandafasilitator',[
            'title' => 'Beranda',
            'platforms' => Platform::where('fasilitator_id', auth()->user()->id)->orderBy('updated_at','DESC')->get(),
            'user' => User::all()
        ]);
    }

    public function create()
    {
        // return view('klien.platform.tambahplatform',[
        //     'title'=>'Buat Platform Baru',
        //     'fasilitator' => Fasilitator::all()
        // ]);
    }

    public function store(StorePlatformRequest $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'deskripsi'=>'required',
            'fasilitator_id'=>'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Platform::create($validatedData);
        return redirect('/berandaklien')->with('success','Platform baru berhasil dibuat!');
    }

    public function show(Platform $platform, $id)
    {
        $fasilitator = Fasilitator::all();
        $platform = Platform::find($id);
        $pelanggan = Pelanggan::where('platform_id',$id)->get();
        $interaksiPltoPel = InteraksiPltoPel::where('platform_id',$id)->get();
        $interaksiPeltoPl = InteraksiPeltoPl::where('platform_id',$id)->get();
        $interaksiPeltoPel = InteraksiPeltoPel::where('platform_id',$id)->get();
        $interaksiDiberikan = DB::table('interaksi_pelto_pels')->select([
            DB::raw('asal'),
            DB::raw('count(*) as jumlah')
        ])->where('platform_id',$id)->orderBy('jumlah','desc')->groupBy('asal')->get();
        $interaksiDiterima = DB::table('interaksi_pelto_pels')->select([
            DB::raw('tujuan'),
            DB::raw('count(*) as jumlah')
        ])->where('platform_id',$id)->groupBy('tujuan')->orderBy('jumlah','desc')->get();
        $komentar = Komentar::where('platform_id',$id)->orderBy('updated_at','DESC')->get();
        $countPelanggan = $pelanggan->count();
        $countInteraksi = $interaksiPeltoPel->count();
        $tipepelanggan = [];
        $idpelanggan = [];
        $idtujuan = [];
        $valuetoPel = [];
        $monetertoPel =[];
        $idasal = [];
        $valuetoPl = [];
        $monetertoPl = [];
        $asalpelanggan = [];
        $value = [];
        $moneter = [];
        $tujuanpelanggan = [];
        $spikepelanggan = [];
        $spike = [];
        foreach ($pelanggan as $p) {
            $tipepelanggan[] = $p -> nama;
            $idpelanggan[] = $p -> id;
        }
        foreach ($interaksiPltoPel as $iPl) {
           $idtujuan[] = $iPl -> pelanggan_id;
           $valuetoPel [] = $iPl -> nilai;
           $monetertoPel [] = $iPl -> moneter;
        }
        foreach ($interaksiPeltoPl as $iPel) {
            $idasal[] = $iPel -> pelanggan_id;
            $valuetoPl [] = $iPel -> nilai;
            $monetertoPl [] = $iPel -> moneter;
         }
         foreach ($interaksiPeltoPel as $iPelPel) {
            $asalpelanggan[] = $iPelPel -> asal;
            $tujuanpelanggan[] = $iPelPel -> tujuan;
            $value [] = $iPelPel -> nilai;
            $moneter [] = $iPelPel -> moneter;
         }
         foreach ($interaksiDiterima as $iD){
            $spikepelanggan [] = $iD -> tujuan;
            $spike[] = $iD -> jumlah;
         }
        
        // dd($moneter);
        return view('klien.strategiklien',[
           'title'=>'Startegi Platform',
           'platform'=> $platform,
           'fasilitator'=>$fasilitator,
           'pelanggan'=>$pelanggan,
           'interaksiPltoPel'=>$interaksiPltoPel,
           'interaksiPeltoPl'=>$interaksiPeltoPl,
           'interaksiPeltoPel'=>$interaksiPeltoPel,
           'interaksiDiberikan'=>$interaksiDiberikan,
           'interaksiDiterima'=>$interaksiDiterima,
           'komentar'=>$komentar,
           'countPelanggan'=>$countPelanggan,
           'countInteraksi'=>$countInteraksi,
           'tipepelanggan'=>$tipepelanggan,
           'idpelanggan'=>$idpelanggan,
           'idtujuan'=>$idtujuan,
           'idasal'=>$idasal,
           'asalpelanggan'=>$asalpelanggan,
           'tujuanpelanggan'=>$tujuanpelanggan,
           'valuetoPel'=>$valuetoPel,
           'monetertoPel'=>$monetertoPel,
           'valuetoPl'=>$valuetoPl,
           'monetertoPl'=>$monetertoPl,
           'value'=>$value,
           'moneter'=>$moneter,
           'spikepelanggan'=>$spikepelanggan,
           'spike'=>$spike
        ]);
    }

    public function showFasilitator(Platform $platform, $id)
    {
        $fasilitator = Fasilitator::all();
        $platform = Platform::find($id);
        $pelanggan = Pelanggan::where('platform_id',$id)->get();
        $interaksiPltoPel = InteraksiPltoPel::where('platform_id',$id)->get();
        $interaksiPeltoPl = InteraksiPeltoPl::where('platform_id',$id)->get();
        $interaksiPeltoPel = InteraksiPeltoPel::where('platform_id',$id)->get();
        $interaksiDiberikan = DB::table('interaksi_pelto_pels')->select([
            DB::raw('asal'),
            DB::raw('count(*) as jumlah')
        ])->where('platform_id',$id)->orderBy('jumlah','desc')->groupBy('asal')->get();
        $interaksiDiterima = DB::table('interaksi_pelto_pels')->select([
            DB::raw('tujuan'),
            DB::raw('count(*) as jumlah')
        ])->where('platform_id',$id)->groupBy('tujuan')->orderBy('jumlah','desc')->get();
        $komentar = Komentar::where('platform_id',$id)->orderBy('updated_at','DESC')->get();
        $countPelanggan = $pelanggan->count();
        $countInteraksi = $interaksiPeltoPel->count();
        $tipepelanggan = [];
        $idpelanggan = [];
        $idtujuan = [];
        $valuetoPel = [];
        $monetertoPel =[];
        $idasal = [];
        $valuetoPl = [];
        $monetertoPl = [];
        $asalpelanggan = [];
        $value = [];
        $moneter = [];
        $tujuanpelanggan = [];
        $spikepelanggan = [];
        $spike = [];
        foreach ($pelanggan as $p) {
            $tipepelanggan[] = $p -> nama;
            $idpelanggan[] = $p -> id;
        }
        foreach ($interaksiPltoPel as $iPl) {
           $idtujuan[] = $iPl -> pelanggan_id;
           $valuetoPel [] = $iPl -> nilai;
           $monetertoPel [] = $iPl -> moneter;
        }
        foreach ($interaksiPeltoPl as $iPel) {
            $idasal[] = $iPel -> pelanggan_id;
            $valuetoPl [] = $iPel -> nilai;
            $monetertoPl [] = $iPel -> moneter;
         }
         foreach ($interaksiPeltoPel as $iPelPel) {
            $asalpelanggan[] = $iPelPel -> asal;
            $tujuanpelanggan[] = $iPelPel -> tujuan;
            $value [] = $iPelPel -> nilai;
            $moneter [] = $iPelPel -> moneter;
         }
         foreach ($interaksiDiterima as $iD){
            $spikepelanggan [] = $iD -> tujuan;
            $spike[] = $iD -> jumlah;
         }
        
        // dd($spike);
        return view('fasilitator.strategifasilitator',[
           'title'=>'Startegi Platform',
           'platform'=> $platform,
           'fasilitator'=>$fasilitator,
           'pelanggan'=>$pelanggan,
           'interaksiPltoPel'=>$interaksiPltoPel,
           'interaksiPeltoPl'=>$interaksiPeltoPl,
           'interaksiPeltoPel'=>$interaksiPeltoPel,
           'interaksiDiberikan'=>$interaksiDiberikan,
           'interaksiDiterima'=>$interaksiDiterima,
           'komentar'=>$komentar,
           'countPelanggan'=>$countPelanggan,
           'countInteraksi'=>$countInteraksi,
           'tipepelanggan'=>$tipepelanggan,
           'idpelanggan'=>$idpelanggan,
           'idtujuan'=>$idtujuan,
           'idasal'=>$idasal,
           'asalpelanggan'=>$asalpelanggan,
           'tujuanpelanggan'=>$tujuanpelanggan,
           'valuetoPel'=>$valuetoPel,
           'monetertoPel'=>$monetertoPel,
           'valuetoPl'=>$valuetoPl,
           'monetertoPl'=>$monetertoPl,
           'value'=>$value,
           'moneter'=>$moneter,
           'spikepelanggan'=>$spikepelanggan,
           'spike'=>$spike
        ]);
    }

    public function edit(Platform $platform)
    {
        //
    }

    public function update(UpdatePlatformRequest $request, Platform $platform, $id)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'deskripsi'=>'required',
            'fasilitator_id'=>'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $platform = Platform::find($id);
        $platform->nama = $request->nama;
        $platform->deskripsi = $request->deskripsi;
        $platform->fasilitator_id = $request->fasilitator_id;
        $platform->save();
        return back()->with('success','Data berhasil diupdate!');
    }

    public function updateGambar(UpdatePlatformRequest $request, Platform $platform, $id)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'required|file|max:2048',
            'fasilitator_id'=>'required'
        ]);
    
    }

    public function destroy(Platform $platform, $id)
    {
        $platform = Platform::find($id);
        $pelanggan = Pelanggan::where('platform_id', $id)->get();
        $indikator = Indikator::where('platform_id', $id)->get();
        $interaksiPltoPel = InteraksiPltoPel::where('platform_id',$id)->get();
        $interaksiPeltoPl = InteraksiPeltoPl::where('platform_id',$id)->get();
        $komentar = Komentar::where('platform_id',$id)->get();
        // $dataIndikator = DataIndikator::where('platform_id',$id)->get();
        // $interaksiPeltoPel = InteraksiPeltoPel::where('platform_id',$id)->get();
        $countKomentar = $komentar->count();
        $countPelanggan = $pelanggan->count();
        $countIndikator = $indikator->count();
        $countInterkasiPltoPel = $interaksiPltoPel->count();
        $countInterkasiPeltoPl = $interaksiPeltoPl->count();
        // $countDataIndikator = $dataIndikator->count();
        
        
        if($countInterkasiPltoPel && $countInterkasiPeltoPl > 0 ){
            if ($countIndikator > 0) {
                $interaksiPltoPel->delete();
                $interaksiPeltoPl->delete();
                $indikator->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            else {
                $interaksiPltoPel->delete();
                $interaksiPeltoPl->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
        }elseif ($countInterkasiPltoPel > 0) {
            if ($countIndikator > 0 ) {
                $interaksiPltoPel->delete();
                $indikator->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            else {
                $interaksiPltoPel->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
        }elseif ($countInterkasiPeltoPl > 0) {
            if ($countIndikator >  0) {
                $interaksiPeltoPl->delete();
                $indikator->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            else {
                $interaksiPeltoPl->delete();
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
        }elseif ($countPelanggan > 0) {
            if ($countIndikator > 0) {
                $pelanggan->delete();
                $indikator->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            else {
                $pelanggan->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
           
        }else {
            if ($countIndikator > 0) {
                $indikator->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            if ($countKomentar > 0) {
                $komentar->delete();
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            else {
                $platform->delete();
                return redirect('/berandaklien')->with('success','Platform berhasil dihapus!');
            }
            
        }
    }
}

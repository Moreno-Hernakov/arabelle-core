<?php

namespace App\Http\Controllers;

// use App\Models\myModel;
use Illuminate\Http\Request;

use App\Models\myMod;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoremyModelRequest;
use App\Http\Requests\UpdatemyModelRequest;

class MyModelController extends Controller
{

    /**
     * display a listenig of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crud', [ 
            "tampil" => myMod::get()->where('is_active', 1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremyModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremyModelRequest $request)
    {
        // dd($request);
        $insertData = request()->all();        
        $insertData["is_active"] = 1;
        // $insertData["updated_at"] = null;
        myMod::create($insertData);

        return redirect('/home')->with('success', 'data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\myMod  $myMod
     * @return \Illuminate\Http\Response
     */
    public function show(myMod $myMod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\myMod  $myMod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $tampil = myMod::get()->where('id', $id);
        // dd($tampil);
        return view('update', [
            "id" => $id,
            "tampil" => myMod::get()->where('id', $id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemyModelRequest  $request
     * @param  \App\Models\myMod  $myMod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemyModelRequest $request, $id)
    {
        // return $id;
        // $insertData = req
        $insertData = [   
            "nama" => $request->nama,  
            "nisn" => $request->nisn,   
            "no_telfon" => $request->no_telfon,
            "is_active" => $request["is_active"] = 1
        ];
        // return $insertData;
        

        myMod::where('id', $id)->update($insertData);
        return redirect('/home')->with('success', 'data telah diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\myMod  $myMod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($myMod);
        // return $id;
        myMod::where('id', $id)->update(['is_active' => 0]);

        return redirect('/home')->with('success', 'data telah dihapus');
    }

    // ================================================================================================================

    public function viuu()
    {
        return myMod::where('is_active', 1)->get();
    }

    public function paginationn()
    {
        return myMod::where('is_active', 1)->latest()->paginate(5);
    }

    public function search()
    {
        $param = request()->dataaa;
        $dataaa = myMod::where('is_active', 1);
        return $dataaa->where('nama', 'LIKE', "%$param%")->get();
    }

    public function insertdt() {
        $data = request()->datanya;
        $aksi = request()->aksinya;
        $id = request()->idnya;
        $kembalian = [];

        switch ($aksi) {
            case "add" :
                $insert = [
                    "nama" => $data[0],
                    "nisn" => $data[1],
                    "no_telfon" => $data[2],
                    "is_active" => 1
                ];
        
                myMod::create($insert);
        
                $kembalian["message"] = "Data Berhasil Ditambahkan";
                break;
            case "update" :
                $insertData = [   
                    "nama" => $data[0],  
                    "nisn" => $data[1],   
                    "no_telfon" => $data[2],
                    "is_active" => 1
                ];
              
                
        
                myMod::where('id', $data[3])->update($insertData);
                $kembalian["message"] = "Data Berhasil diperbarui";
                break;
            case "deleteeee" :
                myMod::where('id', $id)->update(['is_active' => 0]);
                $kembalian["message"] = "Data Berhasil Dihapus";
                break;
            default:
                break;


          
        }
        $kembalian["status"] = 200;
        return $kembalian;
        
    }
}

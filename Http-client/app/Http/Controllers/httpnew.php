<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class httpnew extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://localhost:1337/api/sensorsawahs');
        return $response->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_iot = $request->input('id_iot');
        $kecepatanangin = $request->input('kecepatanangin');
        $suhukelembaban = $request->input('suhukelembaban');
        $kelembabantanah = $request->input('kelembabantanah');
        $cahaya = $request->input('cahaya');
    Http::withHeaders([        
    'Content-Type' => 'application/x-www-form-urlencoded',
    ]);
    $request = Http::withToken('8ef736b87cad47a113deec07eeaf1404ef421638bb2c5648c2e67df3a87dca57f9f8647c3ab611b2196e2fef3e8819c63e18e5e16cd29f5e59a22f7a31b29b6084a62e5f3eb83d4bd6f5e1e6896a692a16d61ef25925ac9b68341ccd088eee812fac2bf2a6cd6c25b6e45803548878a305c1a58630ed56f4da5e2d0e146a2d6f1')
    ->post('http://localhost:1337/api/sensorsawahs', 
    [    
        "data" => [
        "id_iot" => $id_iot,
        "kecepatanangin" => $kecepatanangin,
        "suhukelembaban" => $suhukelembaban,
        "kelembabantanah" => $kelembabantanah,
        "cahaya" => $cahaya
        ]
    ]);
    return $request->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tani,$id)
    {
        $post = Http::get('http://localhost:1337/api/sensorsawahs'.$id);
        return $post->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $tani, $request, $id)
    {
        $tani = request::find($id);
        $id_iot = $request->input('id_iot');
        $suhu = $request->input('suhu');
        $kelembapan = $request->input('kelembapan');
        $cahaya = $request->input('cahaya');
        Http::withHeaders([
        
        'Content-Type' => 'application/json',
        ]);
        $tani = Http::put('http://localhost:1337/api/pertanians/$id', [
            'data' => [
                'id_iot' => $id_iot,
                "suhu" => $suhu,
                "kelembapan" => $kelembapan,
                "cahaya" => $cahaya
                ]
        ]);
        // $request->update($request->all());
        return $tani->json();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getAllPost(){
        $response = Http::get('http://localhost:1337/api/posts');
        return $response->json();
    }
    public function getPostById($id){
        $post = Http::get('http://localhost:1337/api/posts/'.$id);
        return $post->json();
    }
    public function Postadd(Request $request){
        $id_iot = $request->input('id_iot');
        $suhu = $request->input('suhu');
        $kelembapan = $request->input('kelembapan');
        $cahaya = $request->input('cahaya');
        Http::withHeaders([
        
        'Content-Type' => 'application/json',
    ]);
    $post = Http::withToken('80edc67c2ac3e9245111ce6bfbe6451e1c52d945221b0f4451918ec4f132a4101cddff7cb30cac74ed61560d732c65fbce765b03b15924b7096e1d9697ce54977a7c6a0aa62a49a14f7c29993d39ecfd7ad08bf0f7faeff3d3facc9a663ab6b5119a4f007d15361be76cd0333d1ce1735d3239347623fb2d743205a448fffdb6')
    ->post('http://localhost:1337/api/pertanians', [
        'data' => [
        'id_iot' => $id_iot,
        "suhu" => $suhu,
        "kelembapan" => $kelembapan,
        "cahaya" => $cahaya
        ]
    ]);
    return $post->json();
    }
    public function UpdatePost(){
        
        $post = Http::put('http://localhost:1337/api/posts/4', [
            'data' => [ 'Title' => 'Taylor',
            'Description' => 'xdcfgvhbjnklihvgvbhnj']
           
        ]);
        return $post->json();
    }
    public function DeletePost($id){
        $response = Http::delete('http://localhost:1337/api/posts/'.$id, [
        ]);
        return $response->json();
    }
   
   
}

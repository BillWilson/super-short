<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use DB;

class PublicController extends Controller
{
    public function getLink($hashId){

        $linkId = Hashids::decode($hashId);

        if ($linkId){
            $linkJson = DB::table('link')
                ->select('og_data')
                ->where('id', $linkId)
                ->get();

            $data = json_decode($linkJson[0]->og_data);

            return view('linkpage', ['data' => $data]);
        }
    }
}

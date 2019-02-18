<?php

namespace App\Http\Controllers;

use DB;
use Vinkla\Hashids\Facades\Hashids;

class PublicController extends Controller
{
    public function getLink($hashId)
    {
        $linkId = Hashids::decode($hashId);

        if ($linkId) {
            $linkJson = Link::select('og_data')
                ->where('id', $linkId)
                ->get();

            $data = json_decode($linkJson[0]->og_data);

            return view('linkpage', ['data' => $data]);
        } else {
            return redirect('');
        }
    }
}

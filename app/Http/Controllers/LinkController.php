<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use DB;
use Storage;

class LinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function linkList(){

        $links = DB::table('link')
            ->limit(10)
            ->orderBy('id', 'DESC')
            ->paginate(12);

        foreach ($links as $link){
            $link->id = Hashids::encode($link->id);
            $link->og_data = json_decode($link->og_data);
        }

        return view('listlink', ['links' => $links]);
    }

    public function addLink(){

        return view('addlink');
    }

    public function addLinkPost(Request $request){

        $ogData = [
            'pagelink'  => $request->input('pagelink'),
            'title'     => $request->input('title'),
            'content'   => $request->input('content'),
            'image'     => '',
        ];

        $ogDataJson = json_encode($ogData);

        $userId = Auth::user()->id;

        $linkId = DB::table('link')->insertGetId(
            [
                'user_id'       => $userId,
                'og_data'       => $ogDataJson,
                'created_at'    => Carbon::now()->toDateTimeString(),
            ]
        );

        $path = Storage::putFileAs(
            'image', $request->file('image'), Hashids::encode($linkId) . '.jpg'
        );

        $ogData['image'] = $path;

        $ogDataJson = json_encode($ogData);

        $linkId = DB::table('link')
            ->where('id', $linkId)
            ->update(
                [
                    'og_data'       => $ogDataJson
                ]
            );

        if ($linkId){
            return redirect(route('list'));
        }else{
            echo 'Add error';
        }
    }

    public function editLink($hashId){

        $linkId = Hashids::decode($hashId);

        $link = DB::table('link')
            ->where('id', $linkId[0])
            ->first();

        $link->og_data = json_decode($link->og_data);

        return view('editlink', ['hashId' => $hashId, 'link' => $link]);
    }

    public function editLinkPost(Request $request, $hashId){

        $linkId = Hashids::decode($hashId)[0];

        $ogData = [
            'pagelink'  => $request->input('pagelink'),
            'title'     => $request->input('title'),
            'content'   => $request->input('content'),
            'image'     => $request->input('imageOld'),
        ];

        if ($request->file('image') !== null){

            $result = Storage::delete('image/' . $hashId . '.jpg');

            $path = Storage::putFileAs(
                'image', $request->file('image'), Hashids::encode($linkId) . '.jpg'
            );

            $ogData['image'] = $path;
        }

        $ogData = json_encode($ogData);

        $linkId = DB::table('link')
            ->where('id', $linkId)
            ->update(
            [
                'og_data'       => $ogData,
                'updated_at'    => Carbon::now()->toDateTimeString(),
            ]
        );

        if ($linkId){
            return redirect(route('list'));
        }else{
            echo 'Update error';
        }
    }

    public function delLinkPost($hashId){

        $linkId = Hashids::decode($hashId)[0];

        $delete = DB::table('link')
            ->where('id', $linkId)
            ->delete();

        Storage::delete('image/' . $hashId . '.jpg');

        if ($delete){
            return redirect(route('list'));
        }else{
            echo 'Delete error';
        }
    }
}
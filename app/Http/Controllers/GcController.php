<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;


class GcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::select('select * from gctypes');
        if(request()->ajax()){
         return DataTables::of($users)->make(true);
        }
        return view('Index');
    }

    public function text(Request $request)
    {


        $users = DB::select('SELECT
        gcvoucher.id,
        gctypes.gctype,
        gcvoucher.uuid,
        gcvoucher.expdatae,
        gcvoucher.gendate,
        gcvoucher.dateuse,
        gcvoucher.amount
    FROM
        gctypes
        INNER JOIN
        gcvoucher
        ON
            gctypes.id = gcvoucher.catid');
        if(request()->ajax()){


         return DataTables::of($users)
         ->addColumn('uuid', function($data) {
            return DNS1D::getBarcodeHTML($data->id, 'C39+');
        })->addColumn('expdatae', function($data) {
            date_default_timezone_set('Asia/Manila');
            $dateNow = date("Y-m-d H:i");
            $dateExpire = date_format(date_create($data->expdatae),"Y-m-d H:i");

            if( $dateNow > $dateExpire){
                return '<span class="badge text-bg-danger">'.date_format(date_create($data->expdatae),"mDy H:i").'</span>';
            }
            return '<span class="badge text-bg-success">'.date_format(date_create($data->expdatae),"mDy H:i").'</span>';
        })->addColumn('gendate', function($data) {

            return '<span class="badge text-bg-info">'.date_format(date_create($data->gendate),"mDy H:i").'</span>';
        })
        ->rawColumns(['uuid','expdatae','gendate','action'])->make(true);
        }else{
            return 'error';
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $response = DB::insert('insert into gctypes (gctype, gcdesc, code, uuid) values (?, ?, ?, uuid())',
        [$request->gcType, $request->gcDesc, $request->gcType]);

        return $response;
    }

    public function gen(Request $request){
        // return $request;
        try {
            for ($i=0; $i < $request->gennumber; $i++) {
                $response = DB::insert('insert into gcvoucher (catid, uuid, expdatae, gendate, amount) values (?, uuid(), ?, NOW(), ?)',
                [$request->catid, $request->expdate, $request->gcamount]);
            }
            return response()->json(['status'=>true, 'message'=>'GC generate successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false, 'message'=>$th->errorInfo['2']]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from gctypes where uuid = "'.$id.'"');
        return $deleted;
    }


    public function claim(Request $response, $id)
    {

        return 'test';

    }
}

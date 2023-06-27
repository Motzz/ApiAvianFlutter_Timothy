<?php

namespace App\Http\Controllers;

use App\Models\CustomerTTH;
use Illuminate\Http\Request;
use App\Helper\ApiFormatter;
use Illuminate\Support\Facades\DB;

class CustomerTTHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::select(
            DB::raw(" SELECT dc.Name, dc.Address,dc.PhoneNo, dtd.TTOTTPNo,dtd.Jenis,dtd.Qty,dtd.Unit
                        FROM `dbo.customer` dc
                        INNER join `dbo.customertth` dt on dc.CustID = dt.CustID
                        INNER join `dbo.customertthdetail` dtd on dt.TTOTTPNo = dtd.TTOTTPNo  
                        ORDER BY `dc`.`Name` ASC")
        );
        // dd($data);

        // $data = Customer::all();
        if ($data) {
            return ApiFormatter::createApi(200, 'Sukses ambil data', $data);
        } else {
            return ApiFormatter::createApi(400, 'gagal ambil data');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerTTH  $customerTTH
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        //
        $data = DB::select(
            DB::raw("SELECT dc.CustID,dc.Name, dc.Address,dc.PhoneNo, dtd.TTOTTPNo,dtd.Jenis,dtd.Qty,dtd.Unit
                    FROM `dbo.customer` dc
                    INNER join `dbo.customertth` dt on dc.CustID = dt.CustID
                    INNER join `dbo.customertthdetail` dtd on dt.TTOTTPNo = dtd.TTOTTPNo  
                    where dc.CustID = '$customerId'")
        );
        // dd($data);

        // $data = Customer::all();
        if ($data) {
            return ApiFormatter::createApi(200, 'Sukses ambil data', $data);
        } else {
            return ApiFormatter::createApi(400, 'gagal ambil data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerTTH  $customerTTH
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerTTH $customerTTH)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerTTH  $customerTTH
     * @return \Illuminate\Http\Response
     */
    public function update($terimaTolak, $alasan = "", $customerId)
    {
        //
        //
        if ($terimaTolak == 0) {
            $data = DB::update(
                DB::raw("UPDATE `dbo.customertth` dt
                    SET dt.Received=0,dt.ReceivedDate=now(),dt.FailedReason='$alasan'
                    WHERE dt.CustID = '$customerId'")
            );
        } else {

            $data = DB::update(
                DB::raw("UPDATE `dbo.customertth` dt
                    SET dt.Received=1,dt.ReceivedDate=now(),dt.FailedReason='$alasan'
                    WHERE dt.CustID = '$customerId'")
            );
        }

        // dd($data);

        // $data = Customer::all();
        if ($data) {
            return ApiFormatter::createApi(200, 'Sukses update data', $data);
        } else {
            return ApiFormatter::createApi(400, 'gagal update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerTTH  $customerTTH
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerTTH $customerTTH)
    {
        //
    }
}

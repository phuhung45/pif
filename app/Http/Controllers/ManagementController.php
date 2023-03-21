<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $operating_team = Management::where('manage_type', '=', 2)->get();
        $investment_team = Management::where('manage_type', $request->type)->get();
        // $data['operating_team'] = $operating_team;
        // $data['investment_team'] = $investment_team;

        return view('frontend.Company.staff', compact('investment_team'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $operating_team = Management::where('manage_type', '=', 2)->get();
        $investment_team = Management::where('manage_type', '=', 1)->get();
        $data['operating_team'] = $operating_team;
        $data['investment_team'] = $investment_team;
        return view('frontend.Company.staff', $data);
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
        //
    }
}

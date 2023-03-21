<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageVideo;

class ImageVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = ImageVideo::where('category', '=', 'hoat-dong-doan-the')->latest()->paginate(10);
        $data['activities'] = $activities;
        return view('frontend.Company.activities', $data);
    }

    public function video(Request $request){
        $video = ImageVideo::where('category', $request->category)->latest()->paginate(10);

        return view('frontend.Company.video', compact('video'));
    }

    public function notice(){
        $notice = ImageVideo::where('category', '=', 'tin-tuc-cong-ty')->latest()->paginate(10);
        $data['notice'] = $notice;
        return view('frontend.Company.notice', $data);
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
    public function showNotice($id){
        $notice = ImageVideo::find($id);
        return view('frontend.Company.notice_detail', compact('notice'));
    }

    public function show($id)
    {
        $activities = ImageVideo::find($id);
        return view('frontend.Company.activities_detail', compact('activities'));
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

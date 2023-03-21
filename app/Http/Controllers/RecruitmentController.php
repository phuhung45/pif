<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Http\Requests\RecruitmentUpdateRequest;
use Illuminate\Support\Facades\Storage;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruiment = new Recruitment();
        $recruiment = $recruiment->latest()->paginate(5);


        $data['recruitment'] = $recruiment;
        return view('frontend.Recruiment.index', $data);
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
    public function show($slug)
    {
		$recruiment = Recruitment::where('slug', '=', $slug)->first();
        $data['recruiment'] = $recruiment; 
        return view('frontend.Recruiment.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruitment = Recruitment::where('id', $id)->first();
        return view('frontend.Recruiment.edit')->with('recruitment', $recruitment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentUpdateRequest $request, $id)
    {
        $recruitment = Recruitment::find($id);
        $recruitment->title = $request->title;

        if ($request->hasFile('images')) {
            // Delete old image
            if ($recruitment->images) {
                Storage::delete($recruitment->images);
            }
            // Store image
            $image_path = $request->file('images')->store('recruitments', 'public');
            // Save to Database
            $recruitment->images = $image_path;
        }

        if (!$recruitment->save()) {
            return redirect()->back()->with('error', 'update không thành công.');
        }
        return redirect()->route('recruitment')->with('success', 'Cập nhật thông tin tài liệu thành công.');
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

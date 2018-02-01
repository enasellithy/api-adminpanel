<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seo;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seos = Seo::orderBy('created_at','asc')->paginate(10);
        return view('admin.seo.index',compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'meta_name' => 'required|string|max:255',
            'meta_body' => 'required',
        ]);
        Seo::create($request->all());
        return redirect('admin/seo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seo.show')->with('seo',$seo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seo.edit')->with('seo',$seo);
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
        $this->Validate($request,[
            'meta_name' => 'required|string|max:255',
            'meta_body' => 'required',
        ]);
        $seo = Seo::findOrFail($id);
        $seo->meta_name = $request->meta_name;
        $seo->meta_body = $request->meta_body;
        $seo->save();
        return redirect('admin/seo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seo = Seo::findOrFail($id);
        $seo->delete();
        return redirect('admin/seo');
    }
}

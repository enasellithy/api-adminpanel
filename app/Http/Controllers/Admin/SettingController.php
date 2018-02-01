<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Artisan;
use Session;
//use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('created_at','desc')->paginate(10);
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Setting $setting)
    {
        $this->Validate($request,[
            'name' => 'required|string|max:255|unique:settings',
        ]);
        //
        $setting = new Setting;
        $setting->name = $request->name;
        $setting->type = $request->type;
        if($setting->type == 'image'){
            $file = $request->file('body_setting');
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'_'.time().'.'.$extension;
            $path = $request->body_setting->move(env('SMALL_IMAGE_PATH')  , $fileName);
            $setting->body_setting = $path;
        }
        else{
            $setting->body_setting = $request->body_setting;
        }
        //$setting->body_setting = $request->body_setting;
        $setting->save();
        return redirect('admin/setting');
        /*Setting::create($request->all());
        foreach(array_except($request->toArray(), ['_token','submit']) as $key => $req){
            $settingUpdate = $setting->where('name',$key)->get()->first();
            $request = uploadFile($request , 'body_setting');
            $settingUpdate->fill(['value'=>$req])->save();
        }
        /*$request = uploadFile($request , 'body_setting');
        $setting = new Setting();
        $setting->name = $request->name;
        $setting->type = $request->type;
        if($type = 'image'){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }
        $setting->body_setting = $request->body_setting;
        $setting->save();

        //return Setting::create(request()->all());

        /*$setting = new Setting();
        $setting->name = $request->name;
        $setting->type = $request->type;
        if($type = 'image'){

            $setting->body_setting = $request->body_setting;
        }else{
            $setting->body_setting = $request->body_setting;
        }

        //dd($setting);
        $setting->save();

        /*if($type = 'image'){
            if($request->hasFile('body_setting'))
            {
                $request->file('body_setting');
                $name = time() . '.' .$request->file('body_setting')->getClientOriginalExtension();
                //Storage::putFile('public',$name);
                $path = $request->image->move(public_path('files/images'), $name);
                $setting->image = $path;
                $setting->save();
            }
            /*if($request->hasFile('body_setting'))
            {
                $request->file('body_setting');
                $name = time() . '.' .$request->file('body_setting')->getClientOriginalExtension();
                //Storage::putFile('public',$name);
                $path = $request->image->move(public_path('files/images'), $name);
                $setting->image = $path;
                $setting->save();
            }*/
            //$setting->save();
            //$setting->body_setting = $request->body_setting;
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.setting.show')->with('setting',$setting);
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
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect('admin/setting');
    }

    public function ArtisanCommand()
    {
        return view('admin.artisan.index');
    }

    public function ArtisanPost(Request $request)
    {
        if($request->has('command') and $request->has('name'))
        {
            Artisan::call($request->input('command'),['name'=>$request->input('name')],'');
            Session::flash('success','The '.$request->input('command').' '.$request->input('name').' Is Done');
            return back();
        }
    }
}

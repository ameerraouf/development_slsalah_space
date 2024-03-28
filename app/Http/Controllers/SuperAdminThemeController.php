<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeRequest;
use App\Models\Theme;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class SuperAdminThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::latest()->paginate(10);
        return view('themes.index',compact('themes'));
        // return view('admin.admins.index');
    }// end of index
    public function create()
    {
        return view('themes.create');
        // return view('admin.admins.index');
    }// end of index
    public function store(ThemeRequest $request)
    {
        // dd($request->all());
        try{
            $input['name'] = $request->name;
            // if (request('image1')) {
            //     $input['image1'] = store_file(request('image1'), 'themes');
            // }
            // if (request('image2')) {
            //     $input['image2'] = store_file(request('image2'), 'themes');
            // }
            // if (request('image3')) {
            //     $input['image3'] = store_file(request('image3'), 'themes');
            // }
            // if (request('image4')) {
            //     $input['image4'] = store_file(request('image4'), 'themes');
            // }
            if (request('image5')) {
                $input['image5'] = store_file(request('image5'), 'themes');
            }

            $theme=Theme::create($input);
            // if ($request->file('images') && count($request->file('images')) > 0) {
            //     $i = 1;
            //     foreach ($request->file('images') as $key =>$file) {
            //         $file_name =  time().$file->getClientOriginalName();
            //         $file_size = $file->getSize();
            //         $file_type = $file->getMimeType();
            //         $files[] = store_file($file, 'themes');
            //         $theme->media()->create([
            //             'file_name' => $file_name,
            //             'file_size' => $file_size,
            //             'file_type' => $file_type,
            //             'file_status' => true,
            //             'file_sort' => $i,
            //         ]);
            //         $i++;
            //     }
            // }
            Alert::success('Success', 'created successfully');
            return redirect()->route('super-admin-themes.index');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }// end of index

    public function edit($id)
    {
        $theme = Theme::find($id);
        return view('themes.edit',compact('theme'));
    }
    public function update(ThemeRequest $request, $id){

        try{
            $theme = Theme::find($id);
            $input['name'] = $request->name;
            // if ($request->file('image1')) {
            //     if ($theme->image1 != 'themes/LOGO.png') {
            //         delete_file($theme->getRawOriginal('image1'));
            //     }
            //     $input['image1'] = store_file($request->file('image1'), 'themes');
            // }
            // if ($request->file('image2')) {
            //     if ($theme->image2 != 'themes/LOGO.png') {
            //         delete_file($theme->getRawOriginal('image2'));
            //     }
            //     $input['image2'] = store_file($request->file('image2'), 'themes');
            // }
            // if ($request->file('image3')) {
            //     if ($theme->image3 != 'themes/LOGO.png') {
            //         delete_file($theme->getRawOriginal('image3'));
            //     }
            //     $input['image3'] = store_file($request->file('image3'), 'themes');
            // }
            // if ($request->file('image4')) {
            //     if ($theme->image4 != 'themes/LOGO.png') {
            //         delete_file($theme->getRawOriginal('image4'));
            //     }
            //     $input['image4'] = store_file($request->file('image4'), 'themes');
            // }
            if ($request->file('image5')) {
                if ($theme->image5 != 'themes/LOGO.png') {
                    delete_file($theme->getRawOriginal('image5'));
                }
                $input['image5'] = store_file($request->file('image5'), 'themes');
            }
            $theme->update($input);
            Alert::success('تمت التعديل بنجاح', 'theme updated successfully');
            return redirect()->route('super-admin-themes.index');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }

    }


    public function destroy($id)
    {
        $theme = Theme::find($id);
        if ($theme->image1 != 'themes/LOGO.png') {
            delete_file($theme->getRawOriginal('image1'));
        }
        if ($theme->image2 != 'themes/LOGO.png') {
            delete_file($theme->getRawOriginal('image2'));
        }
        if ($theme->image3 != 'themes/LOGO.png') {
            delete_file($theme->getRawOriginal('image3'));
        }
        if ($theme->image4 != 'themes/LOGO.png') {
            delete_file($theme->getRawOriginal('image4'));
        }
        if ($theme->image5 != 'themes/LOGO.png') {
            delete_file($theme->getRawOriginal('image5'));
        }
        $theme->delete();
        Alert::success('تمت الحذف بنجاح', 'theme deleted successfully');
        return redirect()->back();
    }
}

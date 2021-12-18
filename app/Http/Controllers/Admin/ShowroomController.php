<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{public function index()
    {
        
        $showroom = Showroom::all();
        return view('admin.showroom.index',compact('showroom'));
    }


    public function create()
    {
        $showroom = Showroom::all();
        return view('admin.showroom.create',compact('showroom'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
           
            'title_ru'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
            'address_uz'  => ['nullable', 'string'],
            'address_ru'  => ['nullable', 'string'],
            'map_lat'  => ['nullable', 'string'],
            'map_lang'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
            'email'  => ['nullable', 'string'],
            
            
            
        ]);
            if ($valid) {
                $showroom = Showroom::create($request->all());
                return redirect()->route('showroom.index');
            }
    }

        
    public function edit($id)
    {
        $showroom = Showroom::find($id);
        return view('admin.showroom.edit', compact('showroom'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
           
            'title_ru'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
            'address_uz'  => ['nullable', 'string'],
            'address_ru'  => ['nullable', 'string'],
            'map_lat'  => ['nullable', 'string'],
            'map_lang'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
            'email'  => ['nullable', 'string'],
            
           
        ]);
            if ($valid) {
                $showroom =Showroom::find($id);
                $showroom->update($request->all());
               
            }
            return redirect()->route('showroom.index');
    }


    public function destroy($id)
    {
        $showroom = Showroom::find($id);
        
        $showroom->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('showroom.index');
    
    }
}

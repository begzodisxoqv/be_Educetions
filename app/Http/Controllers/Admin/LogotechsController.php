<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logotechs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LogotechsController extends Controller
{
    public function index()
    {
        
        $logotechs = Logotechs::all();
        return view('admin.logotechs.index',compact('logotechs'));
    }


    public function create()
    {
        $logotechs = Logotechs::all();
        return view('admin.logotechs.create',compact('logotechs'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([

            'location_uz'  => ['nullable', 'string'],
            'location_ru'  => ['nullable', 'string'],
            'houre_uz'      => ['nullable', 'string'],
            'houre_ru'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
            
            
        ]);
            if ($valid) {
                $logotechs =Logotechs::create($request->all());
                return redirect()->route('logotechs.index');
            }
    }

        
    public function edit($id)
    {
        $logotechs = Logotechs::find($id);
        return view('admin.logotechs.edit', compact('logotechs'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'location_uz'  => ['nullable', 'string'],
            'location_ru'  => ['nullable', 'string'],
            'houre_uz'      => ['nullable', 'string'],
            'houre_ru'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
         

        ]);
            if ($valid) {
                $logotechs = Logotechs::find($id);
                $logotechs->update($request->all());
               
            }
            return redirect()->route('logotechs.index');
    }


    public function destroy($id)
    {
        $logotechs = Logotechs::find($id);
        
        $logotechs->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('logotechs.index');
    
    }
}

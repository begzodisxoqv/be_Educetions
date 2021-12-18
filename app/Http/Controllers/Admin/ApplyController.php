<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApplyController extends Controller
{
    public function index()
    {
        
        $appleys = Apply::all();
        return view('admin.appleys.index',compact('appleys'));
    }


    public function create()
    {
        $appleys = Apply::all();
        return view('admin.appleys.create',compact('appleys'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([

            'name_uz'  => ['nullable', 'string'],
            'name_ru'  => ['nullable', 'string'],

            'email'      => ['nullable', 'string'],
            'subject_uz'  => ['nullable', 'string'],
            'subject_ru'  => ['nullable', 'string'],
            'message_uz'  => ['nullable', 'string'],
            'message_ru'  => ['nullable', 'string'],
            
        ]);
            if ($valid) {
                $appleys =Apply::create($request->all());
                return redirect()->route('appleys.index');
            }
    }

        
    public function edit($id)
    {
        $appleys = Apply::find($id);
        return view('admin.appleys.edit', compact('appleys'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([

            'name_uz'  => ['nullable', 'string'],
            'name_ru'  => ['nullable', 'string'],
            'email'      => ['nullable', 'string'],
            'subject_uz'  => ['nullable', 'string'],
            'subject_ru'  => ['nullable', 'string'],
            'message_uz'  => ['nullable', 'string'],
            'message_ru'  => ['nullable', 'string'],

        ]);
            if ($valid) {
                $appleys = Apply::find($id);
                $appleys->update($request->all());
               
            }
            return redirect()->route('appleys.index');
    }


    public function destroy($id)
    {
        $appleys = Apply::find($id);
        
        $appleys->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('appleys.index');
    
    }
}

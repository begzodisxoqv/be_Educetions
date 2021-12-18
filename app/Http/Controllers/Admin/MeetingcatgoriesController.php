<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meetingcatgories;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MeetingcatgoriesController extends Controller
{
    public function index()
    {
        
        $meetingcatgories = Meetingcatgories::all();
        return view('admin.meetingcatgories.index',compact('meetingcatgories'));
    }


    public function create()
    {
        $meetingcatgories = Meetingcatgories::all();
        return view('admin.meetingcatgories.create',compact('meetingcatgories'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([

           
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],

            
        ]);
            if ($valid) {
                $meetingcatgories =Meetingcatgories::create($request->all());
                return redirect()->route('meetingcatgories.index');
            }
    }

        
    public function edit($id)
    {
        $meetingcatgories = Meetingcatgories::find($id);
        return view('admin.meetingcatgories.edit', compact('meetingcatgories'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([

            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
        ]);
            if ($valid) {
                $meetingcatgories = Meetingcatgories::find($id);
                $meetingcatgories->update($request->all());
               
            }
            return redirect()->route('meetingcatgories.index');
    }


    public function destroy($id)
    {
        $meetingcatgories = Meetingcatgories::find($id);
        
        $meetingcatgories->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('meetingcatgories.index');
    
    }
}

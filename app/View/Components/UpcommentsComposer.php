<?php


namespace App\View\Components;

use App\Models\Upcomment;
use Illuminate\View\View;

class UpcommentsComposer
{
    public function compose(View $view)
    {
        $upcomments = Upcomment::all();
        $view->with('upcomments', $upcomments);
     
    }
}

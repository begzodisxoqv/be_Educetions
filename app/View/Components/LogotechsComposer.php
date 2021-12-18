<?php


namespace App\View\Components;



use App\Models\Logotechs;
use Illuminate\View\View;

class LogotechssComposer
{
    public function  compose(View $view)
    {
        $logotechs = Logotechs::first();
        $view->with('logotechs', $logotechs);
    }
}

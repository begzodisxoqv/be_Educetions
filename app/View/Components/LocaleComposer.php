<?php


namespace App\View\Components;

use Illuminate\View\View;

class LocaleComposer
{
    public function compose(View $view)
    {
        $view->with('locale', app()->getLocale());
    }

}

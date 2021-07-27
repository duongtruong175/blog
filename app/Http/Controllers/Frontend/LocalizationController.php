<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    //
    private $localeActive = ['en', 'vi'];

    /**
     * Function change locale when route request
     */
    public function changeLocale(Request $request, $locale)
    {
        if(in_array($locale, $this->localeActive)) {
            $request->session()->put('locale', $locale);
            return redirect()->back();
        }
        return abort(400);
    }
}

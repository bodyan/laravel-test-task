<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use DB;

class BrowserComposer
{

    public function compose(View $view)
    {
        $browsers = DB::table('tracker_agents')
                 ->select('browser', DB::raw('count(*) as total'))
                 ->groupBy('browser')
                 ->get();
        $view->with('browsers', $browsers);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Workplace;
use Illuminate\Http\Request;

class WorkplaceInfoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Workplace $workplace)
    {
        return view('workplace.view', ['workplace' => $workplace]);
    }
}

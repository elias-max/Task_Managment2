<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taskcategory;
class admin extends Controller
{
    public function getTaskcategory(Request $r)
    {
        $taskcategory = Taskcategory::find($r->id);
        return response()->json([
            'taskcategory' => $taskcategory,
            'msg' => 'success'
        ]);
    }
}

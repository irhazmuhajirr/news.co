<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use App\Helper\Helpers;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $temp_data = explode('-', $request->archive_month_year);
        $month = $temp_data[1];
        $year = $temp_data[0];
        
        return redirect()->route('archive-pages', [$year, $month]);
    }

    public function pages($year, $month)
    {
        Helpers::read_json();
        
        $archives = Post::with('rSubCategory')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)
                            ->orderBy('created_at', 'desc')->paginate(8);
        foreach ($archives as $data) {
            $ts = strtotime($data->created_at);
            $created_date = date('F, Y', $ts);
            break;
        }

        return view('frontend.archives', compact('created_date', 'archives'));
    }
}

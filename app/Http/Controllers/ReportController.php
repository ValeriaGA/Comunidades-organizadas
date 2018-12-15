<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatReport;
use App\SubCatReport;

class ReportController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_service = SubCatReport::where('cat_report_id', $cat_service[0]->id)->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();
        return view('report.create', compact('categories_service', 'categories_security'));
    }

    public function show(Incident $report)
    {
        return view('report.show', compact('report'));
    }
}

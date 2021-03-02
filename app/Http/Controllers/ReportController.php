<?php

namespace App\Http\Controllers;

use App\Tax;
use App\Property;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function searchTax()
    {
       
        $properties  = Property::latest()->get() ;
        
        return view('reports/taxreport',compact('properties'))->with('params',"Total Collection Report")->with('data',null);
    }
    public function taxSearched(Request $request)
    {
        session(['_old_input' => $request->all()]);
        $startdate = $request->startdate ;
        $enddate = $request->enddate ;
        
        $properties  = Property::latest()->get() ;
        $alltax = Tax::latest()->where('property_id',$request->property)
        ->when($startdate, function ($query) use ($startdate) {
            return $query->where('created_at', '>', '%' . $startdate . '%') ;
        })->orWhere('created_at', '<', '%' . $enddate . '%')  
        ->when($enddate, function ($query) use ($enddate) {
            return $query->where('created_at', '<', '%' . $enddate . '%') ;
        })
        ->get();
        return view('reports/taxreport',compact('properties','alltax'))->with('params',"Total Collection Report")->with('data',"fetch")->with('search',$request->all()) ;

    }
}

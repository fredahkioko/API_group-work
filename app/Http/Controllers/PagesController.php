<?php

namespace App\Http\Controllers;
use App\Models\Pettycash;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Withdraw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    	public function getIndex()
	{	
		$sales = Sale::all();
		 $totalrevenue = 0;
        if ($sales) {
            foreach ($sales as $w) {
                $with = $w->price;
                $totalrevenue += $with;
            }
        }
        $ccategory = Productcategory::all();
        $cproduct = Product::all();
        $totalcategory = count($ccategory);
        $totalproduct = count($cproduct);
        $salescart = Salescart::all(); 
        return view ('pages.index' , compact('totalrevenue', 'totalcategory', 'totalproduct', 'salescart'));  

	}
}


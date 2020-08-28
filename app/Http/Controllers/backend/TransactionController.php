<?php

namespace App\Http\Controllers\backend;

use App\Models\Transaction;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::orderBy('created_at', 'DESC')->where('remainingamount', '>', 0)->get();
        $finaltransaction = Transaction::orderBy('created_at', 'DESC')->where('remainingamount', '<=', 0)->get();
        return view('backend.transaction.list', compact('transaction', 'finaltransaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'totalamount' => 'required',
            'depositeamount' => 'required',
            'deposite_by' => 'required',
            'deposite_date' => 'required',
            'bank_name' => 'required',
        ]);
        $message = Transaction::create([
            'totalamount' => $request->totalamount,
            'depositeamount' => $request->depositeamount,
            'remainingamount' => $request->totalamount - $request->depositeamount,
            'deposite_by' => $request->deposite_by,
            'deposite_date' => $request->deposite_date,
            'bank_name' => $request->bank_name,
            'created_by' => Auth::user()->username,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($message) {
            return back()->with('success_message', 'Success! Transaction Made');
        } else {
            return back()->with('error_message', 'Transaction Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
            $purchase = Transaction::find($id);
            $purchase->remainingamount = 0;
            $purchase->depositeamount = $purchase->totalamount;
            $purchase->update();
            return redirect()->back()->with('success_message', 'Successfully paid Remaining Balance');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        $alltransaction = Transaction::orderBy('deposite_date', 'DESC')->get();
        $pdf = PDF::loadview('backend.pdfbill.transaction', compact('alltransaction'));
        return $pdf->download('transaction.pdf');
    }
}

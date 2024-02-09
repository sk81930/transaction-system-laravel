<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = DB::select("select description, id, 
                                    case when `type` = 'debit' then `amount` else 0 end as debit,
                                    case when `type` = 'credit' then `amount` else 0 end as credit,
                                    date,
                                    sum(case when `type` = 'debit' then -`amount` when `type` = 'credit' then `amount` end) over(order by date rows unbounded preceding) as balance
                                    from transaction order by id desc;");

        return view('home',compact("transaction"));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addtransaction()
    {
        return view('addtransaction');
    }

    public function posttransaction(Request $request)
    {

        $validator =  $request->validate([
            'transaction_type' => ['required'],
            'description' => ['required'],
            'amount' => ['required'],
        ]);


        $trans = new Transaction;
        $trans->type = $request->transaction_type;
        $trans->amount = $request->amount;
        $trans->description = $request->description;
        $trans->date = date("Y-m-d");
        $trans->save();

        return redirect()->to("/")->with('message', 'Successfully '.$request->transaction_type."!");
    }


}

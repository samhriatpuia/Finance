<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use App\Models\Deposit;
use App\Models\Department;
use Illuminate\Http\Request;
use DB;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $withdraws=Withdraw::where('deposit_id',$id)->orderBy('created_at','DESC')->get();
        $deposit=Deposit::find($id);
        $withdrawn=Withdraw::where('deposit_id',$id)->get();
        return view('withdraw.index',compact('withdraws','deposit','withdrawn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $deposit=Deposit::find($id);
        
        // dd($withdraw->id);
        $withdraw=Withdraw::where('deposit_id',$id)->latest()->first();
        if($deposit->withdrawn_amount==$deposit->challan_amount)
        {
           return view('withdraw.error');
        }
        else
        {
            return view('withdraw.create',compact('deposit','withdraw'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'release_amount'=>'required',
            'release_date'=>'required',
            'balance'=>'required',
            'deposit_id'=>'required',
        ]);
        $deposit=Deposit::find($request->deposit_id);
        $department=Department::find($deposit->department_id)->pluck('abbreviation');
        do {
            $release_memo = $department[0].'/'.strval(mt_rand( 10000, 99999 ));
         } while ( DB::table( 'withdraws' )->where( 'release_memo', $release_memo )->exists() );
        //  dd($release_memo);
        $withdrawsave=new Withdraw;
        $withdrawsave->release_amount=$request->release_amount;
        $withdrawsave->release_date=$request->release_date;
        $withdrawsave->balance=$request->balance;
        $withdrawsave->deposit_id=$request->deposit_id;
        $withdrawsave->balance=$request->balance;
        $withdrawsave->release_memo=$release_memo;
        $withdrawsave->save();
       


        $deposit=Deposit::find($request->deposit_id);
        $total_withdrawn=Withdraw::where('deposit_id',$request->deposit_id)->pluck('release_amount')->sum();
        $a=$deposit->challan_amount;
        $b=$deposit->withdrawn_amount+$request->release_amount;
        $balance=(int)$a-(int)$b;
    
        Deposit::where('id',$request->deposit_id)->update(['withdrawn_amount'=>$total_withdrawn, 'balance'=>$balance]);
        $withdraws=Withdraw::where('deposit_id',$request->deposit_id);
        return redirect()->route('withdraws.main',$request->deposit_id)->with( ['deposit' => $deposit,'withdraws' => $deposit] )->with('status', 'withdraw updated!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdraw=Withdraw::find($id);
        $deposit=Deposit::where('id',$withdraw->deposit_id)->first();
        return view('withdraw.edit',compact('withdraw','deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'release_amount'=>'required',
            'release_date'=>'required',
            'balance'=>'required',
            'deposit_id'=>'required',
            'release_memo'=>'required'
        ]);
        $update = [
            'release_amount'=>$request->release_amount, 
            'release_date'=>$request->release_date,
            'balance'=>$request->balance,
            'deposit_id'=>$request->deposit_id,
            'release_memo'=>$request->release_memo,
        ];
        $withdraw=Withdraw::where('id',$id);
        $withdraw->update($update);

        $withdraws=Withdraw::where('deposit_id',$request->deposit_id)->orderBy('created_at','DESC')->get();
        $deposit=Deposit::find($request->deposit_id);
        $withdrawn=Withdraw::where('deposit_id',$request->deposit_id)->get();
        return view('withdraw.index',compact('withdraws','deposit','withdrawn'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $withdraw=Withdraw::findOrFail($id);
        $withdraw->delete();
        return back()->with('delete','Withdraw detail is Deleted !');
    }
}

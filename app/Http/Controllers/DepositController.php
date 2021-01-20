<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Redirect;

class DepositController extends Controller
{
    public function mainindex($id)
    {
        $department=Department::findOrFail($id);
        $deposits=Deposit::where('department_id',$id)->paginate(7);
        return view('deposit.index',compact('department','deposits'));
    }

    public function maincreate($id)
    {
        $department=Department::findOrFail($id);
        return view('deposit.create',compact('department'));
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
            'date' => 'required',
            'file_number'=>'required',
            'misc'=>'required',
            'message'=>'required',
            'release_date'=>'required',
            'balance'=>'required',
            'department_id'=>'required',
        ]);
        // dd($request->file_number);
        Deposit::create($request->all());
            
        $department=Department::where('id',$request->department_id)->first();
        // dd($department);
        // $deposit=Deposit::where('department_id',$id)->latest()->first();
        // dd($deposit->id);
        $deposits=Deposit::where('department_id',$request->department_id)->paginate(7);
        return view('deposit.index',compact('department','deposits'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposit=Deposit::findOrFail($id);
        
        return view('deposit.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'file_number'=>'required',
            'misc'=>'required',
            'message'=>'required',
            'release_date'=>'required',
            'balance'=>'required',
            'department_id'=>'required',
            
        ]);
        $update = [
            'date' => $request->date,
            'file_number'=>$request->date,
            'misc'=>$request->misc,
            'message'=>$request->message,
            'release_date'=>$request->release_date,
            'balance'=>$request->balance,
            'department_id'=>$request->department_id,
        ];
        Deposit::where('id',$id)->update($update);

        
        // dd($request->department_id);
        $department=Department::where('id',$request->department_id)->first();
        // dd($department->department_name);
        $deposits=Deposit::where('department_id',$request->department_id)->paginate(7);
        return view('deposit.index',compact('department','deposits'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deposit::where('id',$id)->delete();
        return back()->with('delete','Deposit detail is Deleted !');
    }
}

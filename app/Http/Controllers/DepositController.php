<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index($id)
    {
        $department=Department::findOrFail($id);
        // $deposit=Deposit::where('department_id',$id)->latest()->first();
        // dd($deposit->id);
        $deposits=Deposit::where('department_id',$id)->paginate(15);
        return view('deposit.index',compact('department','deposits'));
    }

    public function create()
    {
        return view('deposit.create');
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
            ]);
            Department::create($request->all());
            
            $departments=Department::paginate(15);
            
            return view('dashboard',compact('departments'))->with('success','New Department is added successfully!');
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
        $department=Department::findOrFail($id);
        
        return view('department.edit', compact('department'));
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
            'department_name' => 'required',
            
            ]);
        $update = ['department_name' => $request->department_name];
        Department::where('id',$id)->update($update);

       
        $departments=Department::paginate(15);
        return redirect()->route('departments.index',compact('departments'))
            ->with('success','Department is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id',$id)->delete();
        return back()->with('delete','Department is Deleted !');
    }
}

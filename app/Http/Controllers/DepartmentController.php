<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
class DepartmentController extends Controller
{
    public function index()
    {
        $departments=Department::paginate(15);

        return view('dashboard',compact('departments'));
    }

    public function create()
    {
        return view('department.create');
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
            'department_name' => 'required',
        
            ]);
            Department::create($request->all());
            
            $department=Department::all()->paginate(10);
            
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
        $village=Village::findOrFail($id);
        $tehsil=Tehsil::all();
        $districts=District::all();
        $villages=Village::orderBy('district')->paginate(10);
        return view('village.edit', compact('villages','village','districts','tehsil'));
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
            'name' => 'required',
            'tehsil' => 'required',
            'district' => 'required',
            'contact'=>'required',
            ]);
        $update = ['name' => $request->name,'tehsil'=>$request->tehsil, 'district'=>$request->district, 'contact'=>$request->contact];
        Village::where('id',$id)->update($update);

        $tehsil=Tehsil::all();
        $districts=District::all();
        $villages=Village::orderBy('district')->paginate(10);
        return redirect()->route('villages.index',compact('tehsil','districts','villages'))
            ->withSuccess('Great! Village updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Village::where('id',$id)->delete();
        return back()->withDelete(' Village is Deleted successfully!');
    }
}

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

        $deposits=Deposit::paginate(15);
        return view('dashboard',compact('departments'));
    }
}

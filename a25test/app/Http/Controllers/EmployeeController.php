<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    
    public function store(EmployeeRequest $request): string {
        $hashed = Hash::make($request['password']); 
        $employee = (new Employee($request->validated()))->fill(['password' => $hashed])->save();
        return json_encode(['employee registered' => (bool)$employee]);            


    }

}

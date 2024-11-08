<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    public function companyList()
    {
        $companies = Companies::all();
        return response()->json($companies, 200);
    }

    // Create a new company
    public function companyCreate(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo'=> $request->logo
,            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $response = Companies::create($data);
        return response()->json($response, 201);
    }

     // Delete an employee
     public function employeeDelete(Request $request)
     {
         $employee = Employees::find($request->id);
         if ($employee) {
             $employee->delete();
             return response()->json(['status' => 'true', 'message' => 'Employee deleted'], 200);
         }
         return response()->json(['status' => 'false', 'message' => 'Employee not found'], 404);
     }

     // Show details of a specific employee
     public function employeeShow(Request $request)
     {
         $employee = Employees::find($request->id);
         if ($employee) {
             return response()->json($employee, 200);
         }
         return response()->json(['status' => 'false', 'message' => 'Employee not found'], 404);
     }

     // Update an employee's details
     public function employeeUpdate(Request $request)
     {
         $employee = Employees::find($request->id);
         if ($employee) {
             $employee->update([
                 'name' => $request->name,
                 'company_id' => $request->company_id,

                 'phone' => $request->phone,
                 'profile' => $request->profile,
                 'updated_at' => Carbon::now(),
             ]);
             return response()->json(['status' => 'true', 'message' => 'Employee updated'], 200);
         }
         return response()->json(['status' => 'false', 'message' => 'Employee not found'], 404);
     }
}

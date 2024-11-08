<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function employee(){
        $employee = Employees::select('employees.*','companies.name as company_name')
        ->when(request('key'), function($query){
            $query->where('employees.name','like','%'.request('key').'%');
        })->leftJoin('companies','employees.company_id','companies.id')
        ->orderBy('id','desc')->paginate(3);
        return view('admin.employee', compact('employee'));
    }
    public function employeeCreate(){
        $company = Companies::select('name','id')->get();
        return view('admin.employeeCreate',compact('company'));
    }

    function employeeInsert(Request $request){
        $this->getValidateData($request);
        $data = $this->getRequestData($request);
        //dd($data);
        if($request -> hasFile('profile')){

            $newfile = uniqid().'_'.$request->file('profile')->getClientOriginalName();
            $request->file('profile')->storeAs('public',$newfile);
            $data['profile']=$newfile;
        }

        Employees::create($data);
        return redirect()->route('home#employee');

    }

    function employeeDelete($id){
        //dd($id);
        Employees::where('id',$id)->delete();
        return redirect()->route('home#employee');
    }

    function employeeEdit($id){
        $employeeUpdate = Employees::where('id',$id)->first();
        $company = Companies::select('name','id')->get();
        return view('admin.employeeEdit', compact('employeeUpdate','company'));
    }

    function employeeUpdate(Request $request,$id){
        $this->getValidateData($request);
        $updateData = $this->getRequestData($request);

        if($request -> hasFile('profile') ){
            $oldfile = Employees::select('profile')->where('id', $id)->first()->toArray();
            $oldfile = $oldfile['profile'];

                Storage::delete('public/'.$oldfile);


            //adding new photo
            $newfile = uniqid().'-'.$request->file('profile')->getClientOriginalName();
            $request->file('profile')->storeAs('public',$newfile);  //storing in the project
            $updateData['profile'] = $newfile; //storing new photo in database by creating an array
        };

        Employees::where('id',$id)->update($updateData);

        return redirect()->route('home#employee');
    }

    private function getRequestData($request){
        return [
         'name' => $request -> name,
         'company_id' => $request->company,
         'profile' => $request->profile,
         'phone' => $request->phone,
        ];
     }
     private function getValidateData($request){
         Validator::make($request->all(),[
             'name' => 'required',
             'company' => 'required',
             'profile' => 'nullable|mimes:jpg,png,jpeg,webp',
             'phone' => 'required',

         ])->validate();
     }
}

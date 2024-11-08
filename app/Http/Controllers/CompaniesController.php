<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CompaniesController extends Controller
{

    public function company(){
        $company = Companies::withCount('employees')
        ->when(request('key'), function($query){
            $query->where('companies.name','like','%'.request('key').'%')
            ->orwhere('companies.email','like','%'.request('key').'%');
        })
        ->orderBy('id','desc')->paginate(5);
        return view('admin.company', compact('company'));
    }

    public function user(){
        return view('user.user');
    }

    public function companyCreate(){
        return view('admin.companyCreate');
    }

    function companyInsert(Request $request){
        //dd($request->all());
        $this->getValidateData($request);
        $data = $this->getRequestData($request);

        if($request -> hasFile('logo')){

            $newfile = uniqid().'_'.$request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public',$newfile);
            $data['logo']=$newfile;
        }
        Companies::create($data);
        return redirect()->route('home#company');
    }

    function companyDelete($id){
        //dd($id);
        Companies::where('id',$id)->delete();
        return redirect()->route('home#company');
    }

    function companyEdit($id){
        $companyData = Companies::where('id', $id)->first();
        //dd($companyData->toArray());
        return view('admin.companyEdit',compact('companyData'));
    }

    function companyUpdate(Request $request, $id){
        $this->getValidateData($request);

        $companyUpdate = $this->getRequestData($request);

        if($request -> hasFile('logo')){

            $oldfile = Companies::select('logo')->where('id',$id)->first();
            $oldfile = $oldfile->logo;
            Storage::delete('public/'.$oldfile);

            $newfile = $request->file('logo') -> getClientOriginalName();
            $request->file('logo')->storeAs('public',$newfile);
            $companyUpdate['logo'] = $newfile;
        }
        Companies::where('id',$id)->update($companyUpdate);
        return redirect()->route('home#company');
    }
    private function getRequestData($request){
        return[
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website
        ];
    }

    private function getValidateData($request){
        Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required',
            'logo' =>'mimes:jpg,png,jpeg,webp',
            'website' => 'required'
        ]

        )->validate();
    }
}

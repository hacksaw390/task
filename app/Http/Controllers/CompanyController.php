<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Str;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->simplePaginate(10);
        return view('companies', compact('companies'));
    }

    public function create()
    {
        return view('addCompany');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required'
        ]);

        if($request->hasFile('logo')){
            $get_img = $request->file('logo');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->fit(100, 100)->save(storage_path('app/public/'.$img));

        }
        Company::create([
            'company_name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $img,

        ]);
        return back()->with('success', 'Company added!');
    }

    public function edit($id)
    {
    	$company = Company::find($id);
        return $company;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $logo = Company::where('id', $request->id)->first()->logo;
        if($request->hasFile('logo')){
            $get_img = $request->file('logo');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->fit(100, 100)->save(storage_path('app/public/'.$img));            
            Storage::disk('public')->delete($logo);
        }

        $data =Company::where('id',$request->id)->first();
        $data->company_name = $request->name;
        $data->email = $request->email;
        $data->website = $request->website;
        if($request->hasFile('logo')){
            $data->logo = $img;
        }
        $data->update();
        return $data;
    }
}

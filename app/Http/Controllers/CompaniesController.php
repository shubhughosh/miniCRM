<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Companies::Paginate(10);
        return view('Backend.company',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required'
        ]);

        $company = new Companies();
        if(isset($request->logo))
        {
            $filename = time() . "." . $request->logo->extension();
            $request->logo->move(public_path("upload"),$filename);
            $company->logo = $filename;
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();
        return redirect()->back()->with('success', 'Successfully Inserted!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies, $id)
    {
            $comupdate = Companies::find($id);
            if(isset($request->logo))
            {
                if ($comupdate->logo!=NULL) {
                    $logo_path = public_path().'/upload/'.$comupdate->logo;
                    unlink($logo_path);
                }
                $filename = time() . "." . $request->logo->extension();
                $request->logo->move(public_path("upload"),$filename);
                $comupdate->logo = $filename;
            }
            $comupdate->name = $request->name;
            $comupdate->email = $request->email;
            $comupdate->website = $request->website;
            $comupdate->save();
            return redirect()->back()->with('updated', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies, $id)
    {
        Companies::find($id)->delete();
        return redirect()->back()->with('deleted', 'Successfully Deleted!');
    }
}

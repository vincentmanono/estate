<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allBranches()
    {
        $branches = Branch::latest()->get();
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Branch::class) ;
        return view('branches.createEdit')->with('param','CreateBranch');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Branch::class) ;
        $this->validate($request,[

            'name'=>['required'],
            'status'=>['required']

        ]);

        $upd = new Branch();

        $upd->name=$request->name;
        $upd->status=$request->status;

        $validate = $upd->save();

        if($validate){
            return redirect()->route('allBranches')->with('success','You have successfully Created a new Branch.');
        }
        else{
            return redirect()->back()->with('error','An error occured while creating the branch !');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $branch = Branch::find($id);
        $this->authorize('view',$branch) ;

        return view('branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        $this->authorize('view',$branch) ;

        return view('branches.createEdit',compact('branch'))->with('param','EditBranch');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'name'=>['required'],
            'status'=>['required']

        ]);

        $upd = Branch::find($id);
        $this->authorize('view',$upd) ;


        $upd->name=$request->name;
        $upd->status=$request->status;

        $validate = $upd->save();

        if($validate){
            return redirect()->route('allBranches')->with('success','You have successfully Updated the Branch details.');
        }
        else{
            return redirect()->back()->with('error','An error occured while updating the branch details!');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del =Branch::find($id);
        $this->authorize('delete',$del) ;

        $del->delete();

        if($del){
            return redirect()->back()->with('success','You have successfully deleted the branch.');
        }
        else{
            return redirect()->back()->with('error','An error occured while deleting the branch!');
        }
    }
}

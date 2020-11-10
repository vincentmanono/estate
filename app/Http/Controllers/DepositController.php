<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Deposit;
use App\Policies\DepositPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $user = User::find(Auth::user()->id);
        $this->authorize('viewAny', Deposit::class);
        if ($user->isOwner()) {
            $deposits = Deposit::latest()->get();
            return view('deposits.index', compact('deposits'))->with('param', 'Deposit');
        } elseif ($user->isManager()) {
            $properties = $user->properties;
            return view('deposits.index', compact('properties'))->with('param', 'Deposit');
        } else {
            $deposits = $user->deposits;
            return view('deposits.index', compact('deposits'))->with('param', 'Deposit');
        }
    }
    public function depositReport()
    {

        $deposits = Deposit::all();
        return view('reports.depositreport', compact('deposits'))->with('params', 'Deposits');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Deposit::class);
        $this->authorize('create', Deposit::class);
        $user = User::find(Auth::user()->id);
        $tenants = User::latest()->get();
        if ($user->isOwner()) {
            $units = Unit::latest()->get();

            return view('deposits.createEdit', compact('units', 'tenants'))->with('param', 'Add deposit Records');
        } else {
            $properties = $user->properties;

            return view('deposits.createEdit', compact('properties', 'tenants'))->with('param', 'Add deposit Records');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'amount' => ['string', 'required'],
            'date' => ['string', 'required'],
            'user_id' => ['required'],
            'unit_id' => ['string', 'required'],
            'status' => ['string', 'required']

        ]);

        $this->authorize('create', Deposit::class);
        $post = new Deposit();

        $post->amount = $request->amount;
        $post->date = $request->date;
        $post->user_id = $request->user_id;
        $post->unit_id = $request->unit_id;
        $post->status = $request->status;

        $validate = $post->save();

        if ($validate) {
            return back()->with('success', 'You have successfully added the deposit record');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $deposit = Deposit::find($id);
        $this->authorize('view', $deposit);


        if (($deposit->unit->property->user_id == auth()->user()->id) || auth()->user()->isOwner()) {
            return view('deposits.show', compact('deposit'));
        } else {
            Session::flash('error', "You do not have previlagies to view this deposit details");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposit = Deposit::find($id);
        $this->authorize('update', $deposit);


        if (($deposit->unit->property->user_id == auth()->user()->id) || auth()->user()->isOwner()) {
            return view('deposits.createEdit', compact('deposit'))->with('param', 'Edit Deposit Record');
        } else {
            Session::flash('error', "You do not have previlagies to edit this deposit details");
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [

            'amount' => ['string', 'required'],
            'date' => ['string', 'required'],
            'user_id' => ['required'],
            'unit_id' => ['string', 'required'],
            'status' => ['string', 'required']

        ]);

        $deposit =  Deposit::find($id);
        $this->authorize('update', $deposit);

        $update = $deposit->update($request->all());


        if ($update) {
            return back()->with('success', 'You have successfully updated the deposit record');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deposit = Deposit::find($id);
        $this->authorize('delete', $deposit);

        if (auth()->user()->isOwner()) {
            $deposit->delete();
        } else {
            Session::flash('error', "You do not have previlagies to delete this deposit details");
            return back();
        }


        if ($deposit) {
            return redirect()->route('deposit.index')->with('success', 'You have successfully deleted the deposit record.');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  slug  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($plan)
    {
        return view('admin.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  slug  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  slug  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'gateway_id' => 'required|string|max:255',
            'price' => 'required|max:255',
            'active' => '',
            'teams_enabled' => '',
            'teams_limit' => 'max:50',

        ]);

        $plan->update([
            'name' => $request->get('name'),
            'gateway_id' => $request->get('gateway_id') ,
            'price' => $request->get('price') ,
            'active' => $request->get('active') ? true : false ,
            'teams_enabled' => $request->get('teams_enabled') ? true : false ,
            'teams_limit' => $request->get('teams_limit'),
        ]);
        
        // return redirect()->route('admin.plans.index')->withSuccess('You updated the plan!');
        return back()->withSuccess('You updated the plan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  slug  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($plan)
    {
        //
    }
}

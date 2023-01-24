<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tab;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $tabs = Tab::query()->get();

        if( $request->ajax() ) {
            return view('dashboard.tabs.table-data', compact('tabs'))->render();
        }

        return view('dashboard.tabs.index', compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.tabs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'tab_name' => 'required',
                'description' => 'required|max:150',
            ]
        );

        $data = $request->all();

        Tab::create($data);

        // I can use session instead of this toastr, but It is better for appearance
        toastr()->success('Tab Successfully Created');

        return redirect()->route('tab.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $tab = Tab::find($id);

        return view('dashboard.tabs.edit', compact('tab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $tab = Tab::find($id);
        // Validation
        $request->validate(
            [
                'tab_name' => 'required',
                'description' => 'required|max:150',
            ]
        );

        $data = $request->all();

        $tab->update($data);

        // I can use session instead of this toastr, but It is better for appearance
        toastr()->success('Tab Successfully Updated');

        return redirect()->route('tab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tab = Tab::find($request->id)->delete();
    }
}

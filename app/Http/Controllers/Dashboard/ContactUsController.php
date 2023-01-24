<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactUs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function fetch(Request $request)
    {
        $contacts = ContactUs::query()->get();

        if ( $request->ajax() ) {
            return view('dashboard.contact_us.table-data', compact('contacts'))->render();
        }

        return view('dashboard.contact_us.fetch', compact('contacts'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required|numeric',
                'subject' => 'required',
                'message' => 'required|max:250',
            ]
        );

        $data = $request->all();

        ContactUs::create($data);

        // I can use session instead of this toastr, but It is better for appearance
        toastr()->success('Your Massage Was Received');

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        $contact = ContactUs::find($request->id)->delete();

        return redirect()->route('service.index');
    }
}

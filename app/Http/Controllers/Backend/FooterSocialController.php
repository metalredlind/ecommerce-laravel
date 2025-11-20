<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterSocialDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;

use function Termwind\render;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.footer-socials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);

        $footerSocials = new FooterSocial();
        $footerSocials->icon = $request->icon;
        $footerSocials->name = $request->name;
        $footerSocials->url = $request->url;
        $footerSocials->status = $request->status;
        $footerSocials->save();

        toastr('New footer socials created successfully','success','Success');

        return redirect()->route('admin.footer-socials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footerSocials = FooterSocial::findOrFail($id);
        return view('admin.footer.footer-socials.edit', compact('footerSocials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);

        $footerSocials = FooterSocial::findOrFail($id);
        $footerSocials->icon = $request->icon;
        $footerSocials->name = $request->name;
        $footerSocials->url = $request->url;
        $footerSocials->status = $request->status;
        $footerSocials->save();

        toastr('New footer socials updated successfully','success','Success');

        return redirect()->route('admin.footer-socials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerSocials = FooterSocial::findOrFail($id);
        $footerSocials->delete();

        return response(['status'=>'success', 'message'=>'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $footerSocials = FooterSocial::findOrFail($request->id);
        $footerSocials->status = $request->status == 'true' ? 1 : 0;
        $footerSocials->save();

        return response(['message' => 'Status has been updated']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $editorial = Editorial::where('Nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $editorial = Editorial::latest()->paginate($perPage);
        }

        return view('editorial.index', compact('editorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('editorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'Nombre' => 'required'
		]);
        $requestData = $request->all();
        
        Editorial::create($requestData);

        return redirect('editorial')->with('flash_message', 'Editorial added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);

        return view('editorial.show', compact('editorial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);

        return view('editorial.edit', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'Nombre' => 'required'
		]);
        $requestData = $request->all();
        
        $editorial = Editorial::findOrFail($id);
        $editorial->update($requestData);

        return redirect('editorial')->with('flash_message', 'Editorial updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Editorial::destroy($id);

        return redirect('editorial')->with('flash_message', 'Editorial deleted!');
    }
}

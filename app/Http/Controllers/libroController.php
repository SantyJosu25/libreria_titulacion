<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\libro;
use Illuminate\Http\Request;

class libroController extends Controller
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
            $libro = libro::where('ISBN', 'LIKE', "%$keyword%")
                ->orWhere('Titulo', 'LIKE', "%$keyword%")
                ->orWhere('Fecha', 'LIKE', "%$keyword%")
                ->orWhere('PVP', 'LIKE', "%$keyword%")
                ->orWhere('editorial_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $libro = libro::latest()->paginate($perPage);
        }

        return view('libro.index', compact('libro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('libro.create');
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
			'ISBN' => 'required',
			'Titulo' => 'required',
			'Fecha' => 'required',
			'PVP' => 'required'
		]);
        $requestData = $request->all();
        
        libro::create($requestData);

        return redirect('libro')->with('flash_message', 'libro added!');
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
        $libro = libro::findOrFail($id);

        return view('libro.show', compact('libro'));
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
        $libro = libro::findOrFail($id);

        return view('libro.edit', compact('libro'));
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
			'ISBN' => 'required',
			'Titulo' => 'required',
			'Fecha' => 'required',
			'PVP' => 'required'
		]);
        $requestData = $request->all();
        
        $libro = libro::findOrFail($id);
        $libro->update($requestData);

        return redirect('libro')->with('flash_message', 'libro updated!');
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
        libro::destroy($id);

        return redirect('libro')->with('flash_message', 'libro deleted!');
    }
}

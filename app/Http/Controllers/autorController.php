<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\autor;
use Illuminate\Http\Request;

class autorController extends Controller
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
            $autor = autor::where('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Apellido', 'LIKE', "%$keyword%")
                ->orWhere('libro_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $autor = autor::latest()->paginate($perPage);
        }

        return view('autor.index', compact('autor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('autor.create');
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
			'Nombre' => 'required',
			'Apellido' => 'required'
		]);
        $requestData = $request->all();
        
        autor::create($requestData);

        return redirect('autor')->with('flash_message', 'autor added!');
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
        $autor = autor::findOrFail($id);

        return view('autor.show', compact('autor'));
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
        $autor = autor::findOrFail($id);

        return view('autor.edit', compact('autor'));
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
			'Nombre' => 'required',
			'Apellido' => 'required'
		]);
        $requestData = $request->all();
        
        $autor = autor::findOrFail($id);
        $autor->update($requestData);

        return redirect('autor')->with('flash_message', 'autor updated!');
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
        autor::destroy($id);

        return redirect('autor')->with('flash_message', 'autor deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{

    protected $ruleValidation =  [
        'title' => 'required|max:80',
        'text' => 'required|',
        'author' => 'required|max:60',
        'email' => 'nullable|email|max:100',
        'url' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $highlights = Highlight::orderBy('updated_at', 'desc')->paginate(20);

        return view('admin.highlights.index', ['highlights' => $highlights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.highlights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate($this->ruleValidation);

        $data = $request->all();
        $newHighlight = new Highlight();
        $newHighlight->title = $data['title'];
        $newHighlight->text = $data['text'];
        $newHighlight->author = $data['author'];
        $newHighlight->email = $data['email'];
        $newHighlight->url = $data['url'];

        $saved = $newHighlight->save();

        if (!$saved) {
            dd('note saved');
        }

        return redirect()->route('highlights.show', $newHighlight->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function show(Highlight $highlight)
    {
        return view('admin.highlights.show', ['highlight' => $highlight]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function edit(Highlight $highlight)
    {
        //dietro le quinte facciamo un controllo su id
        // $higlight = Highlight::findOrFail($id);
        // dd($higlight);

        return view('admin.highlights.edit', ['highlight' => $highlight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Highlight $highlight)
    {

        $validateData = $request->validate($this->ruleValidation);

        $data = $request->all();
        //validazione
        $highlight->update($data);

        return redirect()->route('highlights.show', ['highlight' => $highlight]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Highlight $highlight)

    {
        $highlight->delete();

        return redirect()
            ->route('highlights.index')
            ->with('status', "Highlight $highlight->id deleted!");
    }
}

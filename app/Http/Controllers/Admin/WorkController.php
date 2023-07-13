<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $validations = [
        'title'                 => 'required|string|min:3|max:100',
        'type'                  => 'require|integer|exists:type,id',
        'image_large'           => 'required|url|max:200',
        'image_secondary_one'   => 'nullable|url|max:200',
        'image_secondary_two'   => 'nullable|url|max:200',
        'image_secondary_three' => 'nullable|url|max:200',
        'link'                  => 'require|url|max:200',
        'github'                => 'require|url|max:200',
        'description'           => 'nullable|string',
        'short_description'     => 'required|text|min:20|max:200',
    ];
    
    private $validation_messages = [
        'required'  => 'Il campo :attribute è obbligatorio',
        'min'       => 'Il campo :attribute deve avere almeno :min caratteri',
        'max'       => 'Il campo :attribute non può superare i :max caratteri',
        'url'       => 'Il campo deve essere un url valido',
        'exists'    => 'Valore non valido',
    ];

    public function index()
    {
        $works = Work::paginate(5);
        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.posts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newWork = new Work();
        $newWork->title         = $data['title'];
        $newWork->type_id   = $data['type_id'];
        $newWork->url_image     = $data['image_large'];
        $newWork->url_image     = $data['image_secondary_one'];
        $newWork->url_image     = $data['image_secondary_two'];
        $newWork->url_image     = $data['image_secondary_three'];
        $newWork->link       = $data['link'];
        $newWork->github       = $data['github'];
        $newWork->description       = $data['description'];
        $newWork->short_description       = $data['short_description'];
        $newWork->save();

        $newWork->types()->sync($data['types'] ?? []);

        return to_route('admin.works.show', ['work' => $newWork]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(work $work)
    {
        return view('admin.posts.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(work $work)
    {
        $types       = Type::all();
        return view('admin.posts.edit', compact('work','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, work $work)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $work->title         = $data['title'];
        $work->type_id   = $data['type_id'];
        $work->url_image     = $data['image_large'];
        $work->url_image     = $data['image_secondary_one'];
        $work->url_image     = $data['image_secondary_two'];
        $work->url_image     = $data['image_secondary_three'];
        $work->link       = $data['link'];
        $work->github       = $data['github'];
        $work->description       = $data['description'];
        $work->short_description       = $data['short_description'];
        $work->update();

        $work->types()->sync($data['types'] ?? []);

        return to_route('admin.posts.show', ['post' => $work]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->types()->detach();
        
        $work->delete();

        return to_route('admin.works.index')->with('delete_success', $work);
    }
}

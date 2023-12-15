<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View as TypeView;
use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Support\Facades\{View, DB};
use App\Http\Requests\TextRequest;

class TextController extends Controller
{
    public function __construct()
    {
        View::share('nav', 'text');
    }
    
    public function index(): TypeView
    {
        $texts = Text::all();
        return view('admin.text.index', compact('texts'));
    }
    
    public function create(): TypeView
    {
        return view('admin.text.create');
    }
    
    public function store(TextRequest $request): RedirectResponse
    {
        $data = $request->all();
        $res = Text::create($data);
        if ($res) {
            return to_route('admin.text.index')->with('success', 'Text created successfully.');
        } else {
            return back()->withInput()->withError('Failed to create text.');
        }
    }

    public function edit(string $id): TypeView
    {
        $id = base64_decode($id);
        $text = Text::find($id);
        return view('admin.text.edit', compact(['text']));
    }

    public function update(TextRequest $request, string $id): RedirectResponse
    {
        $id = base64_decode($id);
        $text = Text::find($id);
        $data = $request->all();
        $res = $text->update($data);
        if ($res) {
            return to_route('admin.text.index')->with('success', 'Text updated successfully.');
        } else {
            return back()->withInput()->withError('Failed to update text.');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $id = base64_decode($id);
        Text::destroy($id);
        return to_route('admin.text.index')->with('success', 'Text deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Text;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $texts = new Text;
        if(isset($request->search) and !empty($request->search)){
            $texts = $texts->where('name', 'like', '%' . $request->search . '%');
        }
        $texts = $texts->take(10)->orderBy('id','ASC')->get();
        $all_texts = Text::orderBy('id','ASC')->get();
        // dd($texts);
        return view('welcome', compact('texts', 'all_texts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getTestDatatable(Request $request){
        // dd($request->all());
        // $data = Text::select('*');
        // return Datatables::of($data)->make(true);

        $data = Text::select('*')->orderBy('id', 'ASC');
            // dd($data->get());
            $counter = 1; // Add this line to initialize the counter

            $formattedData = [];

            foreach ($data->get() as $row) {
                $formattedData[] = [
                    'sno' => $counter++,
                    'id' => $row->id,
                    'name' => $row->name,
                    'price' => $row->price,
                    'category' => $row->category,
                    'reportedon' => $row->reportedon,
                    'simple_guideline' => $row->simple_guideline,
                ];
            }
            // dd($data, $formattedData);

            return Datatables::of($formattedData)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a title="Book this test" href="'. route('book-test.create', $row['id']) .'" class="btn btn-info" style="font-size: 15px;">Book Test</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}

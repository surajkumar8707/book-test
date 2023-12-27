<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Mail\UserMail;
use App\Models\BookTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BookTestRequest;
use Illuminate\View\View as TypeView;
use Illuminate\Support\Facades\{View, DB};

class BookTestController extends Controller
{
    public function __construct()
    {
        View::share('nav', 'book-test');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): TypeView
    {
        $book_test = BookTest::with(['text'])->orderBy('id', 'DESC')->get();
        // dd($book_test);
        return view('book-test.index', compact('book_test'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id): TypeView
    {
        // $id = base64_decode($id);
        $text = Text::find($id);
        // dd($text);
        return view('book-test.create', compact('text'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookTestRequest $request): RedirectResponse
    {
        //store records in db
        $data = $request->all();
        $res = BookTest::create($data);

        //send mail
        $mail_details = [
            'subject' => 'Lorem ipsum dolor sit amet',
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed diam nonumy eirmod tempor.'
        ];
        // Mail::to($request->email)->send(new UserMail($mail_details));

        //return response
        if ($res) {
            return to_route('/')->withSuccess('Resource added successfully!');
        } else {
            return to_route('/')->withError('Failed to create resource.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = base64_decode($id);
        $book_test = BookTest::with(['text'])->find($id);
        // dd($book_test->toArray());
        return view('book-test.show', compact('book_test'));
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
}

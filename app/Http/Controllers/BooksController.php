<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verify_user']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books= Book::all();
        $books=Book::paginate(3);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req,[
            'judul'=>'min:3|max:255',
            'slug'=>'unique:books'
            ]);

        $books = Book::create([
            'judul'=>$req->judul,
            'review'=>$req->review,
            'slug'=>str_slug($req->judul)
            ]);

        Session()->flash('save', 'Buku Berhasil Disimpan');

        $yang_sama = Book::where('slug','=',str_slug($books->judul))->first();
        if (isset($yang_sama)) {
            $books->slug = str_slug("$books->id $books->judul");
        } else {
            $books->slug = str_slug($books->judul);
        }
        $books->save();
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $books = Book::where('slug','=',$param)->first();
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($param2)
    {
        $books=Book::where('slug','=',$param2)->first();
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $param3)
    {
        $this->validate($req,[
            'judul'=>'min:3|max:255',
            'review'=>'unique:books'
            ]);
        $books = Book::where('slug','=',$param3)->first();
        $books->update([
            'judul'=>$req->judul,
            'review'=>$req->review
            ]);
        return redirect()->route('books.show',$req->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($param4)
    {
        $books = Book::where('slug','=',$param4)->first();

        Session()->flash('delete', 'Data Berhasil di Hapus');

        $books->delete();
        return redirect()->route('books.index');
    }
}

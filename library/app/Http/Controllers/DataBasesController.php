<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Author;
use App\Models\Reader;
use App\Models\Genre;
use App\Models\Story;
use App\Models\Book;

class DataBasesController
{
    public function Feeling(Request $request){

        $url = $request->url();
        $type = rtrim(substr($url, strrpos($url, '/') + 1), '/');

        if($type == 'story'){
            $table = DB::table('story')
                ->join('books', 'story.book_id', '=', 'books.id')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->join('genres', 'books.genre_id', '=', 'genres.id')
                ->join('readers', 'readers.id', '=', 'story.reader_id')
                ->select('readers.name as name', 'readers.phone', 'books.title', 'authors.name as author', 'story.created_at', 'story.id')
                ->get();
        }
        elseif($type == 'books'){
            $table = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->join('genres', 'books.genre_id', '=', 'genres.id')
                ->select('authors.name as author', 'genres.title as genre', 'books.title', 'books.amount', 'books.id')
                ->get();
        }
        else{
            $table = DB::table($type)->get();
        }

        return view('tables', compact('table', 'type'));
    }

    public function Create(Request $request){

        $type = $request->type;

        switch($type){
            case 'authors':
                return view('create_author');
                break;
            case 'genres':
                return view('create_genre');
                break;
            case 'books':
                $authors = DB::table('authors')->pluck('name', 'id');
                $genres = DB::table('genres')->pluck('title', 'id');
                return view('create_book', compact('authors', 'genres'));
                break;
            case 'readers':
                return view('create_reader');
                break;
            case 'story':
                $books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->join('genres', 'books.genre_id', '=', 'genres.id')
                ->select('books.id', 'books.title', 'authors.name as author_name', 'genres.title as genre_name')
                ->get();
                $readers = DB::table('readers')->pluck('name', 'id');
                return view('create_story', compact('books', 'readers'));
                break;
            default:
                return redirect()->route('story');
        }
    }

    public function CreateSave(Request $request){
        
        $type = $request->input('type');

        switch($type){
            case 'authors':
                $name = $request->input('name');
                $author = Author::where('name', $name)->first();
                
                if(!$author){
                    $author = new Author();
                    $author->name = $name;
                    $author->save();
                }

                return redirect()->route('authors');
                break;

            case 'books':
                $title = $request->input('title');
                $author = $request->input('author');
                $genre = $request->input('genre');
                $amount = $request->input('amount');
                
                $book = new Book();
                $book->title = $title;
                $book->author_id = $author;
                $book->genre_id = $genre;
                $book->amount = $amount;
                $book->save();

                return redirect()->route('books');
                break;
            
            case 'genres':
                $title = $request->input('title');
                $genre = Genre::where('title', $title)->first();

                if(!$genre){
                    $genre = new Genre();
                    $genre->title = $title;
                    $genre->save();
                }

                return redirect()->route('genres');
                break;
            
            case 'readers':
                $name = $request->input('name');
                $phone = $request->input('phone');
                $reader = Reader::where('name', $name)->where('phone', $phone)->first();

                if(!$reader){
                    $reader = new Reader();
                    $reader->name = $name;
                    $reader->phone = $phone;
                    $reader->save();
                }
                
                return redirect()->route('readers');
                break;

            case 'story':
                $reader_id = $request->input('reader_id');
                $book_id = $request->input('book_id');
                $story = new Story();
                $story->reader_id = $reader_id;
                $story->book_id = $book_id;
                $story->save();

                return redirect()->route('story');
                break;
            
            default:
                return redirect()->route('story');
                break;
        }
    }

    public function Update(Request $request){
        
        $previousUrl = $request->headers->get('referer');
        $type = rtrim(substr($previousUrl, strrpos($previousUrl, '/') + 1), '/');
        $id = $request->input('id');

        switch($type){
            case 'authors':
                $author = Author::where('id', $id)->first();
                return view('update_author', compact('author'));
                break;
            case 'genres':
                $genre = Genre::where('id', $id)->first();
                return view('update_genre', compact('genre'));
                break;
            case 'books':
                $book = Book::where('id', $id)->first();
                $authors = DB::table('authors')->pluck('name', 'id');
                $genres = DB::table('genres')->pluck('title', 'id');
                return view('update_book', compact('book', 'genres', 'authors'));
                break;
            case 'readers':
                $reader = Reader::where('id', $id)->first();
                return view('update_reader', compact('reader'));
                break;
            case 'story':
                $books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->join('genres', 'books.genre_id', '=', 'genres.id')
                ->select('books.id', 'books.title', 'authors.name as author_name', 'genres.title as genre_name')
                ->get();
                $readers = DB::table('readers')->pluck('name', 'id');
                $story = Story::where('id', $id)->first();

                return view('update_story', compact('books', 'readers', 'story'));
                break;
            default:
                return redirect()->route('story');
        }
    }

    public function UpdateSave(Request $request){

        $type = $request->input('type');
        $id = $request->id;

        switch($type){
            case 'authors':
                $name = $request->input('name');
                $author = Author::where('name', $name)->first();
                
                if(!$author){
                    $author = Author::where('id', $id)->first();
                    $author->name = $name;
                    $author->save();
                }

                return redirect()->route('authors');
                break;

            case 'books':
                $title = $request->input('title');
                $author = $request->input('author');
                $genre = $request->input('genre');
                $amount = $request->input('amount');

                $book = Book::where('id', $id)->first();
                $book->title = $title;
                $book->author_id = $author;
                $book->genre_id = $genre;
                $book->amount = $amount;
                $book->save();

                return redirect()->route('books');
                break;
            
            case 'genres':
                $title = $request->input('title');
                $genre = Genre::where('title', $title)->first();

                if(!$genre){
                    $genre = Genre::where('id', $id)->first();
                    $genre->title = $title;
                    $genre->save();
                }

                return redirect()->route('genres');
                break;
            
            case 'readers':
                $name = $request->input('name');
                $phone = $request->input('phone');
                $reader = Reader::where('name', $name)->where('phone', $phone)->first();

                if(!$reader){
                    $reader = Reader::where('id', $id)->first();
                    $reader->name = $name;
                    $reader->phone = $phone;
                    $reader->save();
                }
                
                return redirect()->route('readers');
                break;

            case 'story':
                $reader_id = $request->input('reader_id');
                $book_id = $request->input('book_id');

                $story = Story::where('id', $id)->first();
                $story->reader_id = $reader_id;
                $story->book_id = $book_id;
                $story->save();
                
                return redirect()->route('story');
                break;
            
            default:
                return redirect()->route('story');
                break;
       
        }     
    }

    public function Delete(Request $request) {
        
        $previousUrl = $request->headers->get('referer');
        $type = rtrim(substr($previousUrl, strrpos($previousUrl, '/') + 1), '/');
        $id = $request->input('id');

        switch($type){
            case 'authors':
                $author = Author::where('id', $id)->first();
                
                try {
                    $author->delete();
                } catch (\Exception $e) {
                    return redirect()->route('error');
                }

                return redirect()->route('authors');
                break;

            case 'books':
                $book = Book::where('id', $id)->first();

                try {
                    $book->delete();
                } catch (\Exception $e) {
                    return redirect()->route('error');
                }

                return redirect()->route('books');
                break;

            case 'genres':
                $genre = Genre::where('id', $id)->first();
                
                try {
                    $genre->delete();
                } catch (\Exception $e) {
                    return redirect()->route('error');
                }

                return redirect()->route('genres');
                break;

            case 'readers':
                $reader = Reader::where('id', $id)->first();

                try {
                    $reader->delete();
                } catch (\Exception $e) {
                    return redirect()->route('error');
                }

                return redirect()->route('readers');
                break;

            case 'story':
                $story = Story::where('id', $id)->first();
                
                try {
                    $story->delete();
                } catch (\Exception $e) {
                    return redirect()->route('error');
                }

                return redirect()->route('story');
                break;

            default:
                return redirect()->route('story');
        }
    }
}
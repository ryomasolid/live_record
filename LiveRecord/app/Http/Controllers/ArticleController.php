<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = app('firebase.firestore')->database()->collection('articles');
    }

    public function index()
    {
        $articles = $this->db->documents();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function edit(Request $request, $id)
    {
        $article = $this->db->document($id)->snapshot();
        return view('article.edit', compact('article'));
    }

    public function updata(Request $request, $id)
    {
        $input = $request->all();
        $article = $this->db->document($id);
        $article -> update([
            ['path' => 'artistLiveName', 'value' => $input['artistLiveName']],
            ['path' => 'liveSchedule', 'value' => $input['liveSchedule']],
            ['path' => 'setlist', 'value' => $input['setlist']]
        ]);
        return redirect()->route('article.index');
    }

    public function destroy($id)
    {
        $this->db->document($id)->delete();
        return redirect()->route('article.index');
    }

    public function storeCreate(Request $request)
    {
        $input = $request->all();
        $input = [...$input, 'user_id' => Auth::user()->id, 'user_name' => Auth::user()->name];
        $this->db->add($input);
        return redirect()->route('article.index');
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $articles = $user->article->all();
        return view('article.profile', compact('articles'));
    }

    public function nameChange(Request $request, $id)
    {
        $user = Auth::user();
        $article = $user->article->find($id);
        return view('article.edit', compact('article'));
    }
}

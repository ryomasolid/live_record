<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    protected $user;
    protected $db;
    protected $storage;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->db = app('firebase.firestore')->database()->collection('userIcon');
        $this->storage = app('firebase.storage')->getBucket(config('app.gcp_bucket_name'));
    }

    public function configuration()
    {
        return view('setting.configuration');
    }

    public function nameChange()
    {
        return view('setting.nameChange');
    }

    public function change(Request $request)
    {
        $citiesRef = $this->db->collection('test/user/name');
        $citiesRef->document('name')->set([
            'name' => $request->name,
        ]);
        auth()->user()->name = $request->name;
        return view('setting.nameChange');
    }

    public function icon(Request $request)
    {
        $userName = Auth::user()->name;
        $imageFile = $request->file('image');

        $register = $this->storage->upload(fopen($imageFile, 'r'), ['name' => $userName]);
        $this->db->document($userName)->set(['icon' => $register->name()]);
        return redirect()->route('article.index');
    }
}

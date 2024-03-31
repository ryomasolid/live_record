<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Storage\CloudStorageTools;
use Kreait\Firebase;

class SettingController extends Controller
{
    protected $db;
    protected $storage;

    public function __construct()
    {
        $this->db = app('firebase.firestore')->database();
        $this->storage = app('firebase.storage');
    }

    public function configuration()
    {
        $image = 'https://storage.cloud.google.com/liverecord-418106.appspot.com/'.'risu.jpg';
        // dd($image);
        return view('setting.configuration', compact('image'));
    }

    public function nameChange()
    {
        return view('setting.nameChange');
    }

    public function change(Request $request)
    {
        $user = auth()->user();
        // // $sample = $user->fill(["name" => "daichi"])->save();
        // $user->name = $request->name;
        // $user->save();
        return view('setting.nameChange', compact('user'));
    }

    public function icon(Request $request)
    {
        // $document = $request->document;
        // // 画像を"storage/app/public"に保存
        // $document->store('public');


        $imageFile = $request->file('image');
        $objectName = $imageFile->getClientOriginalName();

        $storage = $this->storage;
        if (!$file = fopen($imageFile, 'r')) {
            throw new \InvalidArgumentException('Unable to open file for reading');
        }
        $filePath = $storage->getBucket(config('app.gcp_bucket_name'))->upload($file, ['name' => $objectName])->name();
        dd($filePath);
        return view('setting.configuration');
    }
}

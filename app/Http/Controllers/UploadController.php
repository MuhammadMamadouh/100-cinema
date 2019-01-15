<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload($data = [])
    {
        if (in_array('new_name', $data)) {
            $data['new_name'] === null ? time() : $data['new_name'];
        }
        if (\request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
            Storage::has($data['deleted_file']) ? Storage::delete($data['deleted_file']) : '';
            return \request()->file($data['file'])->storeAs($data['path'], $data['new_name']);
        }
    }
}

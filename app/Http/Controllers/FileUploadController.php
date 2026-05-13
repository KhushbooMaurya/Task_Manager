<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('uploads');

                $file->move($destinationPath, $fileName);

                $upload = Upload::create([

                    'user_id' => auth()->id(),

                    'file_name' => $file->getClientOriginalName(),

                    'file_path' => 'uploads/' . $fileName,

                    'file_type' => $file->getClientMimeType(),
                ]);

                $uploadedFiles[] = $upload;
            }
        }

        return response()->json([

            'success' => true,

            'files' => $uploadedFiles

        ]);
    }
    public function destroy($id)
    {
        $file = Upload::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $fullPath = public_path($file->file_path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $file->delete();

        return back()->with('success', 'File deleted successfully');
    }
}

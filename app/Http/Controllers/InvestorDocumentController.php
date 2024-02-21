<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InvestorDocument;
use Illuminate\Support\Facades\Auth;

class InvestorDocumentController extends Controller
{
    public function documents()
    {
        // if ($this->modules && !in_array("documents", $this->modules)) {
        //     abort(401);
        // }

        $documents = InvestorDocument::where("investor_id",Auth::guard('investor')->user()->id)->get();

        return \view("investors.documents", [
            "selected_navigation" => "documents",
            "documents" => $documents,
        ]);
    }

    public function documentPost(Request $request)
    {
        if (config("app.environment") === "demo") {
            return;
        }
        $max_file_upload_size = 1024 * 1024 * 10;

        $request->validate([
            "file" => "required|mimes:jpeg,bmp,png,gif,svg,pdf|max:$max_file_upload_size",
        ]);
        $path = false;
        if ($request->file) {
            $path = $request->file("file")->store("media", "uploads");
        }

        $document = new InvestorDocument();
        $document->uuid = Str::uuid();
        $document->workspace_id = Auth::guard('investor')->user()->workspace_id;
        $document->investor_id = Auth::guard('investor')->user()->id;
        $document->name = $path;
        $document->path = $path;
        $document->name = $request->file("file")->getClientOriginalName();
        $document->size = $request->file("file")->getSize();
        $document->save();
    }
}

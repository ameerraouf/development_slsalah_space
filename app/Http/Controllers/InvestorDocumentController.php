<?php

namespace App\Http\Controllers;

use App\Models\FoundRound;
use Illuminate\Support\Str;
use App\Models\InvestorChat;
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

    function share($id){
        $document = InvestorDocument::find($id);
        $opportunities = FoundRound::latest()->get();
        return view('investors.share',compact('document','opportunities'));
    }

    function sharePost(Request $request,$id){
        $document = InvestorDocument::find($id);
        $selectedOpportunities = $request->input('selected_opportunities', []);
        $opportunities = FoundRound::latest()->get();
        foreach ($selectedOpportunities as $pioneerId) {
            InvestorChat::create([
                "chat_id"       => 1,
                "user_id"       => $pioneerId,
                "investor_id"   => auth('investor')->user()->id,
                "message"       => ''.$document->name.'',
                "sended_by"     => "investor",
                "file"     => $document->id,
            ]);
        }
        return redirect()->route('investor.documents')->with('success', 'Attachment sent successfully.');
    }

    public function download($id){
        $document = InvestorDocument::find($id);
        // $pdfPath = public_path('uploads/'.$document->path);
        return response()->file(public_path('uploads/'.$document->path),['Content-Disposition' => 'attachment; filename="'.$document->name.'"']);
    }
}

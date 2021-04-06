<?php

namespace App\Http\Controllers;

use App\Models\finalResult;
use Illuminate\Http\Request;

class FinalResultController extends Controller
{
    public function storeResult(Request $request)
    {
        $data = $request->validate([
            'choice' => 'required',
            'group_id' => 'nullable',
        ]);
        finalResult::create($data);
        return redirect()->route('admin.project.final.show')->with('message', 'Send is Done');
    }

    public function showResult()
    {
        return view('backend.results.show', [
            'finalResults' => finalResult::all()
        ]);
    }

    public function destroy(finalResult $finalResult)
    {
        $finalResult->delete();
        return back()->with('message', 'All record is deleted');
    }
}

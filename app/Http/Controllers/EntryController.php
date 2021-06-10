<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();
        $entries = Auth::user()->entries()->where('user_id', $user_id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('entries.index')->with('entries', $entries);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        // dd($request->file);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $entry = new Entry();

        $entry->user_id = Auth::id();
        $entry->title = $request->input('title');
        $entry->body = $request->input('body');
        $entry->entry_date =  Carbon::now();
        if ($request->file) {
            // $this->validate($request, [
            //     'file' => 'required|jpg,jpeg,png,xls,doc,pdf|max:15000',
            // ]);

            $file = $request->file->store('public/uploads');
            $path = Storage::url($file);
            $entry->file =  $path;
        }
        $entry->save();

        return redirect(route('entries.index'))->with('success', 'Entry Created');
    }

    public function edit($id)
    {
        $entry = Entry::find($id);
        if (Auth::id() !== $entry->user_id) {
            return redirect('dashboard')->with('error', 'Error try again');
        }
        return view('entries.edit')->with('entry', $entry);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $entry = Entry::find($id);
        $entry->title = $request->input('title');
        $entry->body = $request->input('body');
        $entry->updated_at = now();
        if ($request->file) {
            // $this->validate($request, [
            //     'file' => 'required|jpg,jpeg,png,xls,doc,pdf|max:15000',
            // ]);

            $file = $request->file->store('public/uploads');
            $path = Storage::url($file);
            Storage::disk()->delete($entry->file);
            $entry->file = $path;
        }
        $entry->save();

        return redirect('/entries')->with('success', 'Entry Updated');
    }

    public function destroy($id)
    {
        $entry = Entry::find($id);
        if (Auth::id() !== $entry->user_id) {
            return redirect('dashboard')->with('error', 'Error try again');
        }
        Storage::disk()->delete($entry->file);
        $entry->delete();
        return redirect(route('entries.index'))->with('success', 'Entry Deleted');
    }
}

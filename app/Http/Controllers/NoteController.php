<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{
    public function index()
    {
        //return "note index";
        $notes = Note::all();
        return view('pages.dashboard', compact('notes'));
        if($notes){
            return view('pages.dashboard', compact('notes'));

            //for mobile
            return response()->json(['notes'=>$notes],200);
        }else{
            return back();
            return response()->json(['message'=>'No Data Found'],404);
        }
    }

    public function show($id)
    {
        $note = Note::find($id);
        if($note){
             //for mobile
            return response()->json(['note'=>$note],200);
        }else{
             //for mobile
            return response()->json(['message'=>'No Note found'],404);
        }
    }

    public function create()
    {
        $notes = Note::all();
        return view('pages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'content'=>'required|max:500',
            'type'=>'required|max:10',
            'image'=>'nullable|max:500',
        ]);

        $note = new Note();
        $note->content = $request->content;
        $note->type = $request->type;
        //$note->image = $request->image;
        if($request->file('image')){
            $img_file = $request->file('image');
             $img_name = $img_file->getClientOriginalName();
             $img_file->storeAs('public/images/', $img_name); //name and extention
             $note->image = $img_name;
             $note->save();
             return redirect()->route('notes.list')->with('success', "New Note created successfully");

        }
        //for mobile
        return response()->json(['message'=>'Note Added Successfully'],200);

    }

    public function report()
    {
        $users = User::all();
        $notes = Note::all();
        $data = Note::where('type','!=',"normal")->get();
        $count = count($data);
        return view('pages.report', compact('notes','users','count'));
    }

    public function edit($id)
    {
        $note = Note::find($id);
        return view('pages.edit', compact('note'));
        //return "my id".$id;
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'content'=>'required|max:500',
            'type'=>'required|max:10',
            'image'=>'nullable|max:500',
        ]);

        $note = Note::find($id);
        if($note){
            $note->content = $request->content;
            $note->type = $request->type;
            // $note->image = $request->image;
            if($request->file('image')){
                $img_file = $request->file('image');
                 $img_name = $img_file->getClientOriginalName();
                 $img_file->storeAs('public/images/', $img_name); //name and extention
                 $note->image = $img_name;
                 $note->update();
                 return redirect()->route('notes.list')->with('success', "Note updated successfully");
                  //for mobile
                 return response()->json(['message'=>'Note Updated Successfully'],200);
            }else{
                $note->update();
                return redirect()->route('notes.list')->with('fail', "Note fail successfully");
            }

        }else{
            return redirect()->route('notes.list')->with('fail', "Note fail successfully");
             //for mobile
            return response()->json(['message'=>'No Note Updated Found'],404);

        }
    }

    public function trash()
    {
        $notes = Note::onlyTrashed()->get();

        $dataTrash = compact('notes');
        return view('pages.trash')->with($dataTrash);
    }
    public function destroy($id)
    {
        $notes = Note::where('id',$id)->delete();

        //$dest_image = $note->image;
        //$dest_title_img = $note->title_img;

        if($notes){

            //$note->delete();
            return redirect()->route('notes.trash',compact('notes'))->with('success','Service Deleted Successfully');
            //for mobile
            return response()->json(['message'=>'Note Deleted Successfully'],200);

        }else{
            return redirect()->route('notes.list')->with('error','Service field delete');
             //for mobile
            return response()->json(['message'=>'No Note found'],404);
        }

    }

    public function forceDelete(Request $request,$id)
    {
        //$note = Note::withTrashed()->find($id);
        $note = Note::where('id', $id)->forceDelete();
        //$dest_image = $note->image;
        //$dest_title_img = $note->title_img;

        if($note){

            //$note->forceDelete($id);
            return redirect()->back();
            //for mobile
            return response()->json(['message'=>'Note Deleted Successfully'],200);

        }else{
            return redirect()->route('notes.list')->with('error','Service field delete');
             //for mobile
            return response()->json(['message'=>'No Note found'],404);
        }

    }

    public function restore($id)
    {
        $note = Note::withTrashed()->find($id)->restore();
        return redirect('notes.list',compact('note'));
    }

    public function restore_all()
    {
        Note::onlyTrashed()->restore();
        return back()->with('success', 'All Notes Restored Successfully');
    }
}

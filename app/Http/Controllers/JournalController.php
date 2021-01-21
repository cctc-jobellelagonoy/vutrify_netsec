<?php

namespace App\Http\Controllers;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JournalController extends Controller{
	
    /* Controller na maghahandle ng CRUD ng Journals */

    public function index()
    {
        $journals = Journal::latest()->paginate(5);
  
        return view('journals.index',compact('journals'))
            ->with('index', (request()->input('page', 1)));
    }
   

    public function create()
    {
        return view('journals.create');
    }
  
    public function store(Request $request){
		 $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
		
		$request->user()->fill([
			'title' => Hash::make($request->newPassword),
			'description' => Hash::make($request->newPassword),
		])->save();
	
	
		/*
        $request->validate([
            'title' => Hash::make($request['title']),
            'description' => Hash::make($request['description']),
        ]);*/
  
        Journal::create($request->all());
			
        return redirect()->route('journals.index')
                        ->with('success','Journal created successfully.');
    }
   
   
   
    public function show(Journal $journal)
    {
        return view('journals.show',compact('journal'));
    }
   
    public function edit(Journal $journal)
    {
        return view('journals.edit',compact('journal'));
    }
  
 
    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $journal->update($request->all());
  
        return redirect()->route('journals.index')
                        ->with('success','Journal updated successfully');
    }
  
    public function destroy(Journal $journal)
    {
        $journal->delete();
  
        return redirect()->route('journals.index')
                        ->with('success','Journals deleted successfully');
    }
	
}

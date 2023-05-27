<?php

namespace App\Http\Controllers;

use App\Models\Taskcategory;
use Illuminate\Http\Request;

class TaskcategoryController extends Controller

{
    public function index()
    {
        $taskcategory = new Taskcategory();
        $taskcategory = $taskcategory->get();
        return view('dashbord.dashbord',[
            'taskcategory' =>$taskcategory
            ]);

    }

    public function edit($id)
    {
        $taskcategories = Taskcategory::where('id' ,'=',$id)->get();
     
        return view('taskcategory.edit_taskcategory',compact('taskcategories'));

    }


    public function create()
    {
        return view('taskcategory.create');

    }

    public function store(Request $request)
    {
        $taskcategory = new Taskcategory();
        $taskcategory->name = $request->name;
        

        $taskcategory->save();
        return Redirect()->route('add.taskcategory');
        
    }

    public function update($id,Request $request)
    {
       
        $taskcategory =  Taskcategory::find($id);
        $taskcategory->name = $request->name;
       
        if($request->is_active){
            $taskcategory->is_active = 1;

        }
      

        if($taskcategory->save())
        {
           
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }
     
        return view('taskcategory.edit',compact('taskcategories'));

    }

        
    public function taskcategoriesData(){
        $taskcategories = Taskcategory::all();
        return view('Admin.all_taskcategories',compact('taskcategories'));
    }
         
     

    public function delete($id)
    {
        $taskcategory =  Taskcategory::find($id);
        if($taskcategory->delete())
        {
           
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }

    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Session;

class CrudController extends Controller
{
    //
    public function showData()
    {
         //$showData = Crud::all();
        //$showData = Crud::simplePaginate(5);
        $showData = Crud::paginate(5);
        return view('show_data', compact('showData'));
    }
    public function addData()
    {
        return view('add_data');
    }
    public function storeData(Request $request)
    {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];
        $customMessage = [
            'name.required' => 'Enter Your Name',
            'name.max' => 'Your Name Can not contain more than 10 Ch',
            'email.required' => 'Enter Your Email',
            'email.email' => 'Email Must be a Valid Email',
        ];
        $this->validate($request,$rules,$customMessage);
        Crud::saveData($request);
        Session::flash('msg','Data Added Successfully');
        return redirect(route('data.show'));
    }
    public function editData($id)
    {
        $editData = Crud::find($id);
        return view('edit_data',compact('editData'));
    }
    public function updateData(Request $request,$id)
    {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];
        $customMessage = [
            'name.required' => 'Enter Your Name',
            'name.max' => 'Your Name Can not contain more than 10 Ch',
            'email.required' => 'Enter Your Email',
            'email.email' => 'Email Must be a Valid Email',
        ];
        $this->validate($request,$rules,$customMessage);
        Crud::updateData($request, $id);
        Session::flash('msg','Data Updated Successfully');
        return redirect(route('data.show'));
    }
    public function deleteData($id)
    {
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session::flash('msg','Data Deleted Successfully');
        return redirect(route('data.show'));
    }
}

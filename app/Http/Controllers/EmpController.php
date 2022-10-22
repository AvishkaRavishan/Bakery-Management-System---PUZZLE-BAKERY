<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\admin;
use PDF;


class EmpController extends Controller
{
    
    public function store(Request $request){

        // dd($request->all());
       $admins =new admin; 

        $name = $request->name;
        $empNumber = $request->empNumber;
        $email = $request->email;
        $address = $request->address;
     

      $d =   DB::insert("INSERT INTO `admins`(`name`,`empNumber`,`email`,`address`) VALUES ('$name','$empNumber', '$email',  '$address')");
    
      $data=admin::all();

     return Redirect::to('adminEmployeeList')->with('data',$d);

      // return Redirect::to('userDashboard')->with('account',$data);

}

  public function emp_view(Request $request)
  {


    $d= DB::table('admins')->paginate(10); //Query Builder
    //Or you can use
    $d= admin::paginate(10); //Eloquent ORM
    
      return view("adminEmployeeList")->with('data',$d);

  
  }

  
  public function search_emp(Request $request){



    $id=$request->id;

 

    $name = $request->name;



   

    $d=admin::when($request->has("name"),function($q)use($request){

      return $q->where("name","like","%".$request->get("name")."%");

    })->paginate(5);




   return view("adminEmployeeList")->with('data',$d);


}
public function downloadPdf()

    {

        $users = admin::all();



        // share data to view

        view()->share('users-pdf',$users);

        $pdf = PDF::loadView('users-pdf', ['users' => $users]);

        return $pdf->download('users.pdf');

    }

    public function dashboard(Request $request){


      $admins = admin::count(); 

      return view("adminDashboard" , compact ('admins'));
  
  }


}

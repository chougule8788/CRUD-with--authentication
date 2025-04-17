<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

//import blade-template package
use Illuminate\Support\Facades\Blade;

//import validation package
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function getData(){
        //find all data
        // $Students = Student::all();

        //find one data
        // $Student = Student::find(1);

        //find multiple
        // $Student = Student::find([1,3]);

        //use arrgigate functions
        // $Student = Student::min('age');
        // $Student = Student::max('age');
        // $Student = Student::sum('age');
        // $Student = Student::count('age');
        // $Student = Student::avg('age');

        //USE CONDITION BASED
        // $Student = Student::where('age','26')->get();
        // $Student = Student::where('name','shreyash')->where('age','>=','20')->get();
        // replace this
        $Student = Student::where([['name','shreyash'],['age','>=','20']])->get();
        


        return $Student;
    }

    //USE BLADE TEMPLATES
    public function index(){
        //using blade we can directly render data from controller
        $data = "this is render using blade template";
        return blade::render('<h1>{{$data}}</h1>',['data'=>$data]);

    }
    //GET DATA FROM API
    public function getDataAPI(){
        $students = Student::all();
        return $students;
    }

    public function addDataAPI(Request $request){

        $rules = [
            'name'=>'required | min:2 | max:10',
            'age'=>'required | min:1 | max:2',
            'gender'=>'required'
        ];

        $validator = validator($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{

        $Student = new Student();
        $Student->name = $request->name;
        $Student->age = $request->age;
        $Student->gender = $request->gender;

        if($Student->save()){
            return ['success'=>true,'message'=>'Data add sucessfully'];
        }else{
            return ['success'=>false,'message'=>'something is wrong'];
        }
    }
    }


    public function UpdateDataAPI(Request $request){
        

        $Student = Student::find($request->sid);

        $Student->name = $request->name;
        $Student->age = $request->age;
        $Student->gender = $request->gender;

        if($Student->save()){
            return ['success'=>true,'message'=>'Data update sucessfully'];
        }else{
            return ['success'=>false,'message'=>'something is wrong'];
        }

        
    }

    public function DeleteDataAPI($id){

        $Student= Student::destroy($id);
        if($Student){
            return ['success'=>true,'message'=>'Data Deleted'];
        }else{
            return ['success'=>false,'message'=>'somthing wrong'];
        }
    }

    public function SearchDataAPI($name){
        $result = Student::where('name','LIKE',"%$name%")->get();

        if($result){
            return $result;
        }else{
            return ['success'=>false,'message'=>'Data not found'];
        }
    }
}

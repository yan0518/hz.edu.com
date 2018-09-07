<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StudentsRepository;
use App\Repositories\StudentsRepositoryEloquent;
use App\Http\Requests\StudentsRequest;


class StudentsController extends Controller
{
    protected $students;

    function __contruct(StudentsRepositoryEloquent $students){
        parent::__construct();
        $this->students = $students;

    }
    //
    public function entrance(){

    	return view('students/entrance');
    }

    public function info(){
        return view('students/info');
    }

    public function class(){
        return view('students/class');
    }

    //save stu info
    public function new(StudentsRequest $request){
        // $this->students->create($request->all());
        // return "aa";
    }
}

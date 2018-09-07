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
        $data = $request->all();
        
        $request_data['name'] = $data['name'];
        $request_data['school'] = $data['school'];
        $request_data['birthday'] = $data['birth_date'];
        $request_data['aclass'] = $data['grade'];
        $request_data['courses'] = isset($data['courses'])?$data['courses']:0;
        $request_data['isremedial'] = isset($data['isremedial'])?$data['isremedial']:0;
        $request_data['perplex'] = isset($data['perplex'])?$data['perplex']:0;
        $request_data['way'] = isset($data['way'])?$data['way']:0;

        $rst = $this->students->create($request_data);

        if ($rst) {
            Toastr::success('录入成功!');
            return redirect(route('students.info'));
        }
        else{
            Toastr::error('录入失败!');
        }
    }
}

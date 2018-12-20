<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StudentsRepository;
use App\Repositories\StudentsRepositoryEloquent;
use App\Http\Requests\StudentsRequest;
use Toastr;


class StudentsController extends Controller
{
    protected $students;

    function __construct(StudentsRepositoryEloquent $students){
        $this->students = $students;

    }
    //
    public function entrance(){

    	return view('students/entrance');
    }

    public function info($name = ''){
        if(!empty($name)){
            $students = $this->students->findWhere(['name' => $name])->paginate(10);
        }
        else{
            $students = $this->students->paginate(10);
        }
        return view('students/info', compact('students'));
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

        $rst = $this->students->updateOrCreate(['name' => $data['name'], 'birthday' => $data['birth_date']], $request_data);

        if ($rst) {
            Toastr::success('录入成功!');
            return redirect(route('students.info'));
        }
        else{
            Toastr::error('录入失败!');
        }
    }
}

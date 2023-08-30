<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //
    public function index(){
        $paginate = Employee::paginate(3);
        $teams = Team::with('members')->whereNull('parent_team_id')->get();
        return view('index',compact('paginate','teams'));
    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $employee = Employee::where('name', 'LIKE', '%'.$keyword.'%')->get();
        $result = $request->validate(['keyword'=>'required'],['keyword' => 'Không tìm thấy kết quả']);
        if($result){
            Session::flash('success','Đã tìm thấy kết quả');
        }
        return view('search',compact('employee'));
    }
    public function store(Request $request) {
        if($request->isMethod('POST')) {
            $params = $request->except('_token');
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'tel' => 'required|regex:/^[0-9]{4}-[0-9]{4}-[0-9]{4}$/|
                |max:14',
            ],[
                'name.required' => 'ban chua nhap name',
                'email.required' => 'ban chua nhap email',
                'email.email' => 'ban chua nhap dung format email',
                'tel.required' => 'ban chua nhap tel',
                'tel.regex' => 'tel phai co dinh dang xxxx-xxxx-xxxx',
                'tel.max' => 'tel khong duoc vuot qua 14 ky tu',
            ]);

            $employee = Employee::create($params);
            if($employee->id) {
                Session::flash('success', ' them nhan vien thanh cong');
                return redirect()->route('employee.index');
            }
        }
        return view('create');
    }

    public function update(Request $request, $id){
        $employee = Employee::find($id);
        if($request->isMethod('POST')) {
            $params = $request->except('_token');
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'tel' => 'required|regex:/^[0-9]{4}-[0-9]{4}-[0-9]{4}$/|
                |max:14',
            ],[
                'name.required' => 'ban chua nhap name',
                'email.required' => 'ban chua nhap email',
                'email.email' => 'ban chua nhap dung format email',
                'tel.required' => 'ban chua nhap tel',
                'tel.regex' => 'tel phai co dinh dang xxxx-xxxx-xxxx',
                'tel.max' => 'tel khong duoc vuot qua 14 ky tu',
            ]);

            $employee = Employee::where('id',$id)->update($params);
            if($employee) {
                Session::flash('success', ' sua nhan vien thanh cong');
                return redirect()->route('employee.index');
            }
        }
        return view('edit',compact('employee'));
    }

    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('success','xóa thành công nhân viên');
    }

}

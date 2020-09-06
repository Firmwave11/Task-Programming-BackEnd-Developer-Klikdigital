<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
    	return view('student',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'email' => 'required|unique:student',
                'phone' => 'required|numeric',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:5000'
        ]); 
        $student = new Student;
    	$student->name = $request->name;
    	$student->phone = $request->phone;
        $student->email = $request->email;
        $file = $request->file('foto');
        $namaFile = $file->getClientOriginalName();
        $tujuan =base_path().'/public/uploads';
        $file->move($tujuan, $namaFile);
        $student->foto = $namaFile;
        $student->save();
        return redirect('')->with('status', 'Data student telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
    	return view('student-edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:5000'
        ]); 
    	$student->name = $request->name;
    	$student->phone = $request->phone;
        $student->email = $request->email;
        if (empty($request->file('foto'))){
            $student->foto = $student->foto;
        }
        else{
            unlink(base_path().'/public/uploads/'.$student->foto);
            $file = $request->file('foto');
            $namaFile = $file->getClientOriginalName();
            $tujuan =base_path().'/public/uploads';
            $file->move($tujuan, $namaFile);
            $student->foto = $namaFile;
        }
        $student->save();
        return redirect('')->with('status', 'Data student telah dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('')->with('status','Student berhasil dihapus.');
    }
}

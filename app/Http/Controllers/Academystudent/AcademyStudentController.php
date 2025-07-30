<?php

namespace App\Http\Controllers\Academystudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\AcademyStudent;
use App\Libraries\Core\File;

class AcademyStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = DB::table("academy_students")->get();
        return view("pages.academystudent.index", ["students" => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.academystudent.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo $request->name;
        $student = new AcademyStudent();
        $student->name = $request->name;
        $student->fathers_name = $request->fname;
        $student->mothers_name = $request->mname;
        $student->academy_batch_id = 1;
        $student->created_at = "2000-8-2";
        $student->dob = "2000-8-5";
        $student->contact_no = $request->cnt;
        $student->address = $request->address;

        if ($request->hasFile('photo')) {
            //upload file
            $imageName = $student->id . '.' . $request->photo->extension();
            $request->photo->move(public_path('img'), $imageName);

            //update database
            $student->photo = $imageName;

            $student->save();
        }

        return redirect("academystudents");
    }

    /**
     * Display the specified resource.
     */
    function show($id)
    {
        $student = AcademyStudent::find($id);
        return view("pages.academystudent.show", ["student" => $student]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    function edit($id)

    {
        $student = AcademyStudent::find($id);
        return view("pages.academystudent.edit", ["student" => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    //  function update(Request $request, AcademyStudent $student)
    // {
    //     $student->name=$request->name;
    //     $student->fathers_name=$request->fname;
    //     $student->mothers_name=$request->mname;
    //     $student->academy_batch_id=1;
    //     $student->created_at="2000-8-2";
    //     $student->dob="2000-8-5";
    //     $student->photo="download-6-jpg.jpg";
    //     $student->contact_no=$request->cnt;
    //     $student->address=$request->address;

    //     $student->update();

    //     return redirect("academystudents");
    // }

    public function update(Request $request, $id)
    {
        $student = AcademyStudent::find($id);

        $student->name = $request->name;
        $student->fathers_name = $request->fname;
        $student->mothers_name = $request->mname;
        $student->academy_batch_id = 1;
        $student->created_at = "2000-8-2";
        $student->dob = "2000-8-5";
        $student->contact_no = $request->cnt;
        $student->address = $request->address;

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('img'), $imageName);
            $student->photo = $imageName;
        }

        $student->update();

        return redirect("academystudents")->with('success', 'Student updated successfully!');
    }


    function confirm($id)
    {
        $student = AcademyStudent::find($id);
        return view("pages.academystudent.confirm", ["student" => $student]);
        // echo "$student";
    }

    /**
     * Remove the specified resource from storage.
     */
    // function destroy(AcademyStudent $student)
    // {
    //     $student->delete();
    //     return redirect("academystudents");
    // }
    public function destroy($id)
    {
        $student = AcademyStudent::find($id);
        $student->delete();

        return redirect("academystudents")->with('success', 'Student deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students',$students);
    }



    public function create(): View
    {
        return view('students.create');
    }
 
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size and allowed extensions as needed
        ]);
        // Check if the file was uploaded successfully
        if ($request->hasFile('photo')) {
            // Generate a unique file name
            $fileName = time().$request->file('photo')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('photo')->move(public_path('images'), $fileName);
            // Save the product with the file name
            $validatedData['photo'] = $fileName; 
        }
        Student::create($validatedData);
        return redirect('students')->with('flash_message', 'Student Addedd!');  
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'productname' => 'required',
        
    //         'description' => 'required',
    //         'price' => 'required',
    //         'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size and allowed extensions as needed
    //     ]);
    //     // Check if the file was uploaded successfully
    //     if ($request->hasFile('photo')) {
    //         // Generate a unique file name
    //         $fileName = time().$request->file('photo')->getClientOriginalName();
    //         // Move the uploaded file to the public/images directory
    //         $request->file('photo')->move(public_path('images'), $fileName);
    //         // Save the product with the file name
    //         $validatedData['photo'] = $fileName; 
    //     }
    //     Product::create($validatedData);
    //     return redirect()->back();
    // }
 
    
    public function show($id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }
 
    
    public function edit($id): View
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }
 

    // public function update(Request $request, $id){

    //     $student = Student::find($id);

    //     if ($request->hasFile('photo')) {   
             
           
                // $file = $request->file('photo');
                // $name = $file->getClientOriginalName();
                // $file->move(public_path('images'), $name);
    
                // if (file_exists(public_path($name =  $file->getClientOriginalName()))) 
                // {
                //     unlink(public_path($name));
                // };
                // //Update Image
                // $student->photo = $name;
              
             //upload new file  $request->file('photo')->getClientOriginalName();
            //  $file = $request->file('photo');
            //  $filename = $file->getClientOriginalName();
            //  $file->move($path, $filename);
   
             //for update in table
//              $student->update($request);
//              return redirect('students')->with('flash_message', 'student Updated!');  
//         }
//    }

    public function update(Request $requestUp, $id)
    {
        $student = Student::find($id);
        $input = $requestUp->all();

        // Check if the file was uploaded successfully
        if ($requestUp->hasFile('photo')) {
            // Generate a unique file name
            $fileNameUp = time().$request->file('photo')->getClientOriginalName();
            // Move the uploaded file to the public/images directory$fileNameUp
            $requestUp->file('photo')->move(public_path('images'), $fileNameUp);
            // Save the product with the file name
            $input['photo'] = $fileNameUp; 
        }

        
        
        $student->update($input);
        return redirect('students')->with('flash_message', 'student Updated!');  
    }
 
   
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!');  
    }
}

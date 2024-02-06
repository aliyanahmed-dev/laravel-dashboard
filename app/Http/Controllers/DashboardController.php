<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;

use App\Models\Newsletter;
use App\Models\UserInquiries;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Session;

class DashboardController extends Controller
{
    public function students_list()
    {
        $students = User::where('role_id', 3)->get();
        return view('admin.student-management.list')->with(compact('students'));
    }

    public function students_add()
    {
        $batches = Batch::where('is_active', 1)->get();
        return view('admin.student-management.add')->with(compact('batches'));
    }
    public function students_edit($id)
    {
        $batches = Batch::where('is_active', 1)->get();
        $student = User::where('id', $id)->first();
        return view('admin.student-management.edit')->with(compact('student', 'batches'));
    }
    public function students_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:16',
            'phone' => 'required|string|max:50',
            'batch' => 'required',
            'pay_status' => 'required',
        ]);
        $student =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 3,
            'batch_id' => $request->batch,
            'pay_status' => ($request->pay_status == 'paid') ? 1 : 0,
            'fees_amount' => $request->fees_amount,
        ]);
        // $student->assignRole('Student');
        Session::flash('message', 'Stuent created successfully!');

        return redirect()->route('students_list')->with('notify_success', 'Student Created successfully.');
    }
    public function students_update(Request $request)
    {
        $student = User::where('id', $request->id)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => [
                'required',
                Rule::unique('users')->ignore($student->id), // Ignore the current user's email
                'max:255',
            ],
            'phone' => 'required|string|max:50',
            'batch' => 'required',
            'pay_status' => 'required',
        ]);

        $upstudent =  User::where('id', $student->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->phone,
            'batch_id' => $request->batch,
            'pay_status' => ($request->pay_status == 'paid') ? 1 : 0,
            'fees_amount' => $request->fees_amount,
        ]);
        if ($request->password) {
            $pvalidated = $request->validate([
                'password' => 'string|min:6',
            ]);
            $student->password = bcrypt($request->password);
            $student->save();
        }

        Session::flash('message', 'Stuent Updated successfully!');
        return redirect()->route('students_list')->with('notify_success', 'Student Updated successfully.');
    }



    // Teachers

    public function teachers_list()
    {
        $teachers = User::where('role_id', 2)->get();
        return view('admin.teacher-management.list')->with(compact('teachers'));
    }

    public function teachers_add()
    {
        return view('admin.teacher-management.add');
    }
    public function teachers_edit($id)
    {
        $student = User::where('id', $id)->first();
        return view('admin.teacher-management.edit')->with(compact('student'));
    }
    public function teachers_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'designation' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|string|min:6|max:8',
            'image' => 'required|image|mimes:jpg,jpeg,png,jfif|max:500',
        ]);

        $teacher =  User::create([
            'name' => $request->name,
            'full_name' => $request->designation,
            'email' => $request->email,
            'contact' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 2,

        ]);
        // dd($request->image);

        $teacher->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');

        // $student->assignRole('Student');
        Session::flash('message', 'Teacher created successfully!');

        return redirect()->route('teachers_list')->with('notify_success', 'Teacher Created successfully.');
    }
    public function teachers_update(Request $request)
    {
        $student = User::where('id', $request->id)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'designation' => 'required|string|max:50',
            'email' => [
                'required',
                Rule::unique('users')->ignore($student->id), // Ignore the current user's email
                'max:255',
            ],
            'phone' => 'required|string|max:50',
        ]);

        $upstudent =  User::where('id', $student->id)->update([
            'name' => $request->name,
            'full_name' => $request->designation,
            'email' => $request->email,
            'contact' => $request->phone,

        ]);
        if ($request->password) {
            $pvalidated = $request->validate([
                'password' => 'string|min:6',
            ]);
            $student->password = bcrypt($request->password);
            $student->save();
        }
        
         if ($request->hasFile('image')) {
            $student->clearMediaCollection('thumbnail');
            $student->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');
        }
        
        
            
            

        Session::flash('message', 'Stuent Updated successfully!');
        return redirect()->route('teachers_list')->with('notify_success', 'Student Updated successfully.');
    }
    public function check_slug(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        return response()->json(['slug' => $slug]);
    }

    public function students_status($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = ($user->status == 1) ? 0 : 1;
        $user->save();
        $message = ($user->status == 1) ? 'user Activated successfully!' : 'user Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
    
    public function inquiries()
    {
        $inquiries = UserInquiries::get();
        
    
       return view('admin.inquiries-management.list',compact('inquiries'));
    }
    
    public function newsletters()
    {
        $newsletters = Newsletter::get();
       return view('admin.inquiries-management.newsletters',compact('newsletters'));
    }
    
    
    
    
    
}

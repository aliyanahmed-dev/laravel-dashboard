<?php

namespace App\Http\Controllers;

use App\Models\AttendedQuizAnswers;
use App\Models\AttendedQuizzes;
use App\Models\Category;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Quizoption;
use App\Models\Quizquestion;
use App\Models\Review;
use App\Models\User;
use App\Models\Blog;
use App\Models\UserInquiries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IndexController extends Controller
{

    public function index()
    {
        $teachers = User::where('role_id', 2)->get();
        $courses = Course::where('is_featured', 1)->where('is_active', 1)->get();
        $course_categories = Category::where('type', 'course')->where('is_active', 1)->get();
        $blogs = Blog::where('is_active', 1)->get();
        $data = compact('courses', 'course_categories','blogs','teachers');
        return view('home')->with($data);
    }

    public function courses()
    {
        $courses = Course::where('is_featured', 1)->where('is_active', 1)->get();
        $course_categories = Category::where('type', 'course')->where('is_active', 1)->get();
        $data = compact('courses', 'course_categories');
        return view('courses')->with($data);
    }
    public function course_detail($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $courses = Course::where('is_active', 1)->inRandomOrder()->take(3)->get();
        $reviews = Review::where('course_id', $course->id)->where('status', 1)->get();
        $course_categories = Category::where('type', 'course')->where('is_active', 1)->get();
        $data = compact('course', 'course_categories', 'courses', 'reviews');
        return view('course-detail')->with($data);
    }

    public function contact()
    {
        return view('contact');
    }
    public function contact_submit(Request $request)
    {
        
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);
        
         $inquiry =  UserInquiries::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->number,
            'message' => $request->message,
        ]);
        
        
        
        return redirect()->back()->with('notify_success', 'Inquiry Submited');
    }
    
    public function about()
    {
         $teachers = User::where('role_id', 2)->get();
         $data = compact('teachers');
        return view('about')->with($data);
    }
    public function teachers()
    {
        return view('teachers');
    }
    public function blogs($slug = null)
    {
        if($slug){
            $cat = Category::where('slug', $slug)->first();
            $blogs = Blog::where('category_id', $cat->id)->where('is_active', 1)->orderBy('created_at', 'desc')->paginate();
        }else{
            $blogs = Blog::where('is_active', 1)->orderBy('created_at', 'desc')->paginate();
        }
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
        return view('blogs',compact('blogs','categories'));
    }
    
    public function blog_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $related_blogs = Blog::where('id' ,'!=', $blog->id)->orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
   
        return view('blog-detail',compact('blog','related_blogs','categories'));
    }
    
    

    public function login()
    {
        return view('sign-in');
    }
    public function profile()
    {
        $user = Auth::user();

        return view('profile')->with(compact('user'));
    }


    public function attend_test($slug)
    {
        $user = Auth::user();
        $quiz = Quiz::where('slug', $slug)->first();
        $quiztime = $quiz->duration;
        $startTime = now();
        $total_marks  = 0;
        foreach ($quiz->questions as $questions) {
            $total_marks = $total_marks + $questions->mark;
        }
        $check_test = AttendedQuizzes::where('quiz_id', $quiz->id)->where('user_id', $user->id)->first();
        // dd($check_test);
        if ($check_test) {

            $current_time = now();
            $quiz_starttime = $check_test->created_at;
            if ($current_time->diffInMinutes($quiz_starttime) >= $quiztime || $check_test->status == 1) {
                return redirect()->route('profile')->with('error', 'You Have Already Attended The Test');
            } else {
                $elapsed_time = $current_time->diffInMinutes($quiz_starttime);
                $quiztime = $quiztime - $elapsed_time;
                // dd($quiztime);
                $attedded_quiz = AttendedQuizzes::where('quiz_id', $quiz->id)->first();
            }
            // dd($startTime);
        } else {
            $attedded_quiz  = AttendedQuizzes::create([
                'quiz_id' => $quiz->id,
                'user_id' => $user->id,
                'start_time' => $startTime,
                'total_marks' => $total_marks,
                'status' => 0,
            ]);
        }

        return view('quiz-test', compact('user', 'quiz', 'attedded_quiz', 'quiztime'));
    }

    public function quiz_test_form(Request $request)
    {
        // dd($request->question[0]["'id'"]);
        $attended_quiz = AttendedQuizzes::where('id', $request->attended_quiz)->first();
        $quiz = Quiz::where('id', $attended_quiz->quiz_id)->first();
        foreach ($request->question as $key => $answer) {
            $question = Quizquestion::where('id', $answer["'id'"])->first();
            $status = 0;
            if ($question->option_type == 'one') {
                $correct_option  = Quizoption::where('quizquestion_id', $question->id)->where('is_correct', 1)->first();
                if ($correct_option->id == $answer["'answer'"]) {
                    $status = 1;
                }


                $answerstring = $answer["'answer'"];
            } else {
                $correct_option  = Quizoption::where('quizquestion_id', $question->id)->where('is_correct', 1)->pluck('id')->toArray();
                // dd(empty(array_diff($correct_option, $answer["'answer'"])));
                if (empty(array_diff($correct_option, $answer["'answer'"])) && empty(array_diff($correct_option, $answer["'answer'"]))) {
                    $status = 1;
                }
                // dd($status);
                $answerstring = implode(',', $answer["'answer'"]);
            }
            $attended_answer = AttendedQuizAnswers::create([
                'attended_quiz_id' => $attended_quiz->id,
                'answer' => $answerstring,
                'question_id' => $answer["'id'"],
                'marks' => $question->mark,
                'answer_type' => $question->option_type,
                'status' => $status,
            ]);
        }
        $taken_marks  = 0;
        foreach ($attended_quiz->answers as $answer) {
            if ($answer->status == 1) {
                $taken_marks = $taken_marks + $answer->marks;
            }
        }
        $percentage = ($taken_marks / $attended_quiz->total_marks) * 100;
        if ($percentage >= 90) {
            $grade = 'A+';
        } elseif ($percentage >= 80) {
            $grade = 'A';
        } elseif ($percentage >= 70) {
            $grade = 'B';
        } elseif ($percentage >= 60) {
            $grade = 'C';
        } elseif ($percentage >= 50) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }
        $result = ($percentage > 50) ? 1 : 0;
        $update_mark = AttendedQuizzes::where('id', $request->attended_quiz)->update([
            'taken_marks' => $taken_marks,
            'status' => 1,
            'result' => $result,
            'grade' => $grade,
        ]);

        return redirect()->route('quiz-test-result', $request->attended_quiz);
    }

    public function quiz_test_result($id)
    {
        $attended_quiz = AttendedQuizzes::where('id', $id)->first();

        return view('quiz-result')->with(compact('attended_quiz'));
    }

    public function profile_update()
    {
        $user = Auth::user();
        return view('profile-update')->with(compact('user'));
    }
    public function student_pofile_submission(Request $request)
    {
        $user = Auth::user();
        $validiate = $request->validate([
            'fullname' => 'required|string|max:100',
            'address' => 'required|string',
            'guardian_name' => 'required|string|max:100',
            'guardian_number' => 'required|string|max:250',
            'religon' => 'required|string|max:100',
            'gender' => 'required|string|max:100',
            'cnic_number' => 'required|max:255',
        ]);

        if (empty($user->getFirstMediaUrl('profile_image'))) {
            $validiate = $request->validate([
                'profile_image' => 'required|image|mimes:jpg,jpeg,png,jfif|max:300',
            ]);
        }

        if (empty($user->getFirstMediaUrl('cnic_front'))) {
            $validiate = $request->validate([
                'cnic_front' => 'required|image|mimes:jpg,jpeg,png,jfif|max:500',
            ]);
        }

        if (empty($user->getFirstMediaUrl('cnic_back'))) {
            $validiate = $request->validate([
                'cnic_back' => 'required|image|mimes:jpg,jpeg,png,jfif|max:500',
            ]);
        }


        $student = User::where('id', $user->id)->update([
            'full_name' => $request->fullname,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
            'guardian_number' => $request->guardian_number,
            'religion' => $request->religon,
            'gender' => $request->gender,
            'cnic_number' => $request->cnic_number,
        ]);

        $updated_student = User::where('id', $user->id)->first();

        if ($request->hasFile('profile_image')) {
            $updated_student->addMediaFromRequest('profile_image')
                ->toMediaCollection('profile_image');
        }
        if ($request->hasFile('cnic_front')) {
            $updated_student->addMediaFromRequest('cnic_front')
                ->toMediaCollection('cnic_front');
        }

        if ($request->hasFile('cnic_back')) {
            $updated_student->addMediaFromRequest('cnic_back')
                ->toMediaCollection('cnic_back');
        }

        return redirect()->route('profile')->with('notify_success', 'Profile Updated');
    }


    public function course_review_submission(Request $request)
    {
        $user = Auth::user();
        $validiate = $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string',
            'rating' => 'required',
            'course' => 'required',

        ]);
        $review = Review::create([
            'course_id' => $request->course,
            'user_id' => $user->id,
            'rating' => $request->rating,
            'email' => $user->email,
            'name' => $request->name,
            'comment' => $request->message,
        ]);

        return redirect()->back()->with('notify_success', 'Review Is Uploaded it will be Published once it is Approved');
    }
}

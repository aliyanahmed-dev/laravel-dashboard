<?php

namespace App\Http\Controllers;

use App\Models\AttendedQuizzes;
use App\Models\Batch;
use App\Models\Quiz;
use App\Models\Quizoption;
use App\Models\Quizquestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

use Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\Console\Question\Question;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz-management.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::where('is_active', 1)->get();
        return view('admin.quiz-management.add', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request['question'][0]["'option'"]);
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|unique:quizzes|max:255',
            'difficulty' => 'required|string',
            'duration' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
        ]);
        
          if ($validated->fails()) {
            return response()->json([
                'status' => 2,
                'error' => $validated->errors()->first(),
            ]);
        }


        $quiz = Quiz::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'batch_id' => $request->batch,
            'difficulty' => $request->difficulty,
            'duration' => $request->duration,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
        ]);

        $request_questions = $request->question;
        foreach ($request_questions as $request_question) {
            $question = Quizquestion::create([
                'quiz_id' => $quiz->id,
                'question' => $request_question["'text'"],
                'description' => $request_question["'description'"],
                'mark' => $request_question["'mark'"],
                'option_type' => $request_question["'type'"],
            ]);

            $question_options = $request_question["'option'"];

            foreach ($question_options as $question_option) {
                $option = Quizoption::create([
                    'quizquestion_id' => $question->id,
                    'option' => $question_option["'text'"],
                    'is_correct' => isset($question_option["'answer'"]) ? 1 : 0,
                ]);
            }
            if ($question->option_type == 'one') {
                $quizquestion_answer = Quizoption::where('quizquestion_id', $question->id)->where('is_correct', 1)->first();
                $update_quest = Quizquestion::where('id', $question->id)->update([
                    'answer' => $quizquestion_answer->option,
                ]);
            }
        }

        // Session::flash('message', 'Quiz Created successfully!');
        
         return response()->json([
            'status' => 1,
            'response' => 'Quiz Added',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $batches = Batch::where('is_active', 1)->get();
        $quiz = Quiz::where('id', $quiz->id)->first();
        // dd($quiz->questions);
        return view('admin.quiz-management.edit', compact('batches', 'quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        // dd($request->all());
        // if (isset($request['question'][0]["'id'"])) {
        //     dd('tru');
        // } else {
        //     dd('fals');
        // }
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('quizzes')->ignore($quiz->id),
                'max:255',
            ],
            'difficulty' => 'required|string',
            'duration' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
        ]);

        $upquiz = Quiz::where('id', $quiz->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'batch_id' => $request->batch,
            'difficulty' => $request->difficulty,
            'duration' => $request->duration,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
        ]);

        $request_questions = $request->question;
        foreach ($request_questions as $request_question) {
            if (isset($request_question["'id'"])) {
                $upquestion = Quizquestion::where('id', $request_question["'id'"])->update([
                    'quiz_id' => $quiz->id,
                    'question' => $request_question["'text'"],
                    'description' => $request_question["'description'"],
                    'mark' => $request_question["'mark'"],
                    'option_type' => $request_question["'type'"],
                ]);
                $question = Quizquestion::where('id', $request_question["'id'"])->first();
            } else {
                $question = Quizquestion::create([
                    'quiz_id' => $quiz->id,
                    'question' => $request_question["'text'"],
                    'mark' => $request_question["'mark'"],
                    'option_type' => $request_question["'type'"],
                ]);
            }

            $question_options = $request_question["'option'"];

            foreach ($question_options as $question_option) {
                if (isset($question_option["'id'"])) {
                    $option = Quizoption::where('id', $question_option["'id'"])->update([
                        'quizquestion_id' => $question->id,
                        'option' => $question_option["'text'"],
                        'is_correct' => isset($question_option["'answer'"]) ? 1 : 0,
                    ]);
                } else {
                    $option = Quizoption::create([
                        'quizquestion_id' => $question->id,
                        'option' => $question_option["'text'"],
                        'is_correct' => isset($question_option["'answer'"]) ? 1 : 0,
                    ]);
                }
            }
            if ($question->option_type == 'one') {
                $quizquestion_answer = Quizoption::where('quizquestion_id', $question->id)->where('is_correct', 1)->first();
                $update_quest = Quizquestion::where('id', $question->id)->update([
                    'answer' => $quizquestion_answer->option,
                ]);
            }
        }

        Session::flash('message', 'Quiz Updated successfully!');

        return redirect()->route('quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        Session::flash('message', 'Quiz Deleted successfully!');
        return redirect()->back();
    }

    public function delete_question(Request $request)
    {
        $question_delete = Quizquestion::where('id', $request->questionId)->delete();

        return response()->json(['message' => 'Question Deleted', 'status' => 1]);
    }
    public function delete_option(Request $request)
    {
        $option_delete = Quizoption::where('id', $request->optionId)->delete();

        return response()->json(['message' => 'Option Deleted', 'status' => 1]);
    }

    public function suspend($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        $quiz->is_active = ($quiz->is_active == 1) ? 0 : 1;
        $quiz->save();
        $message = ($quiz->is_active == 1) ? 'Quiz Activated successfully!' : 'Quiz Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }

    public function results($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        $attedded_quizzes = AttendedQuizzes::where('quiz_id', $id)->get();
        return view('admin.quiz-management.results', compact('attedded_quizzes', 'quiz'));
    }
    public function result_detail($id)
    {
        $attedded_quizz = AttendedQuizzes::where('id', $id)->first();
        return view('admin.quiz-management.results-detail', compact('attedded_quizz'));
    }
}

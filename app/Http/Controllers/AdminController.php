<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Question;
use App\Models\QuizHeader;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminhome()
    {
        $sectionCount = Section::count();
        $questionCount = Question::count();
        $quizCount = QuizHeader::count();
        $userCount = User::count();
        $latestUsers = User::latest()->take(5)->get();
        return view('admins.adminhome', compact('latestUsers', 'sectionCount', 'questionCount', 'userCount', 'quizCount'));
    }

    public function globalQuizzes()
    {
        $activeUsers = User::count();

        $questionsCount = Question::where('is_active', '1')->count();

        $sections = Section::withCount('questions')
            ->where('is_active', '1')
            ->orderBy('name')
            ->get();

        $quizesTaken = QuizHeader::count();

        $userQuizzes = QuizHeader::orderBy('id', 'desc')
            ->paginate(10);

        $quizAverage = QuizHeader::avg('score');

        return view(
            'admins.globalQuizzes',
            compact(
                'sections',
                'activeUsers',
                'questionsCount',
                'quizesTaken',
                'userQuizzes',
                'quizAverage'
            )
        );
    }

    public function liveScore()
    {
        $quizData = QuizHeader::all()->sortByDesc('score');

        $data = [];
        foreach($quizData as $quizHead) {
            $data []= [
                'name' => $quizHead->user->name,
                'score' => $quizHead->score,
                'questions_taken' => $quizHead->quiz_size,
                'correct_answers' => $quizHead->quizzes->where('is_correct', 1)->count(),
                'completed' => $quizHead->completed,
                'total_time' => date_diff(\date_create($quizHead->created_at->format('Y-m-d H:i:s')), date_create($quizHead->updated_at->format('Y-m-d H:i:s')), true),
            ];
        }

        return view('admins.livescore', compact('data'));
    }
}

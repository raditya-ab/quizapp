<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Question;
use App\Models\QuizHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $quizData = QuizHeader::get();
        $numOfQuestions = 10;

        $data = [];
        foreach($quizData as $quizHead) {
            $correctAnswers = $quizHead->quizzes->where('is_correct', 1)->count();
            $realtimeScore = $correctAnswers / $numOfQuestions * 100;
            $elapsedTime = date_diff(\date_create($quizHead->created_at->format('Y-m-d H:i:s')), date_create($quizHead->updated_at->format('Y-m-d H:i:s')), true);
            $elapsedSecond = ($elapsedTime->h * 3600) + ($elapsedTime->i * 60) + $elapsedTime->s;

            $data []= [
                'name' => $quizHead->user->name,
                'score' => $quizHead->score,
                'questions_taken' => $quizHead->quiz_size,
                'correct_answers' => $correctAnswers,
                'realtime_score' => $realtimeScore,
                'completed' => $quizHead->completed,
                'total_time' => $elapsedSecond
            ];
        }

        usort($data, function($a, $b) {
            if ($a['realtime_score'] == $b['realtime_score']) {
                if ($a['total_time'] > $b['total_time']) {
                    return 1;
                }
            }
            return $a['realtime_score'] < $b['realtime_score'] ? 1 : -1;
        });

        return view('admins.livescore', compact('data'));
    }
}

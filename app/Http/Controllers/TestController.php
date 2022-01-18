<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequest;
use App\Models\Quiz\Category;
use App\Models\Quiz\Difficulty;
use App\Models\Quiz\Option;
use App\Models\Quiz\Question;
use App\Qquestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Diff;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();

        return view('test', compact('categories'));
    }

    public function show($chap_id)
    {
        //<a class="nav-link" href="{{ route('dash.show', $chap = '3') }}">{{ __('Hard') }}</a>
        $categories = Category::where('id', $chap_id)->with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->where('difficulty_id', '1')
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();

        return view('test', compact('categories'));
    }

    public function shows($chap_id, $dif_id)
    {
        $categories = Category::where('id', $chap_id)->with(['categoryQuestions' => function ($query) use ($dif_id) {
            $query->inRandomOrder()
                ->where('difficulty_id', $dif_id)
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();


        return view('test', compact('categories'));
        //return $cat;
    }

    public function store(StoreTestRequest $request)
    {
        $options = \App\Models\Quiz\Question::find(array_values($request->input('questions')));

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                'option_id' => $option->id,
                'points' => $option->points
            ]
            ];
        })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('results.show', $result->id);
    }

    public function testResult(Request $request)
    {
        $request->validate([
            'questions' => 'required',
            'options' => 'required'
        ]);

        $questions = Question::find(array_values($request->input('questions')));
        $var = $questions->first();
        $difficulty = $var->difficulty_id;
        $chapter = $var->category_id;
        $options = Option::find(array_values($request->input('options')));
        $selections = $request->input('options');

        $results = Category::where('id', $chapter)->with(['categoryQuestions' => function ($query) use ($difficulty) {
            $query->inRandomOrder()
                ->where('difficulty_id', $difficulty)
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();

        //return redirect()->route('results.show', $data);
        return view('result', compact('results', 'selections'));

    }

    public function result($result){
        //$data = explode(',', $result);
        //$type = gettype($result);
        //dd($result);
        return view('result', compact('result'));
    }
}

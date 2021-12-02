<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticsController extends Controller
{
    public function index()
    {
        return Inertia::render('App/Statistics/Statistics', [
            'pieProperties' => $this->getCategoryStatistcs(),
            'lineProperties' => $this->getUsersRegisterPermonth(2021),
        ]);
    }

    public function getCategoryStatistcs()
    {
        $books = Book::selectRaw('category_id, sum(quantity) as total')
                ->groupBy('category_id')
                ->with('category')
                ->get();

        $lable = [];
        $data = [];

        foreach($books as $book) {
            array_push($lable, $book->category->name);
            array_push($data, $book->total);
        }

        return [
            'lables' => $lable,
            'data' => $data,
        ];
    }

    public function getUsersRegisterPermonth($year)
    {
        $months = User::selectRaw('MONTHNAME(created_at) as monthName, MONTH(created_at) as month, count(id) as total')
            ->where('created_at', 'LIKE', '%'. $year .'%')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
            
        $lable = [];
        $data = [];

        foreach($months as $month) {
            array_push($lable, $month->monthName);
            array_push($data, $month->total);
        }

        return [
            'lables' => $lable,
            'data' => $data,
        ];
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Reader;
use App\Model\Book;
use App\Model\ImportBook;
use App\Model\Order;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Home',
        ]);
    }

    public function index()
    {
        $amountReader = Reader::count('id');
        $amountBook = ImportBook::sum('ib_amount');
        $amountLiquidated = Book::sum('b_amount_liquidated');
        $amountOrder = Order::whereIn('d_status', [1, 3, 4])->sum('d_number');
        $amountOrderLiquidated = Order::whereIn('d_status', [3, 4])->sum('d_number');
        $totalBookBorrowing = Order::where('d_status', 1)->sum('d_number');
        $totalBook = $amountBook - ($amountLiquidated + $amountOrder);
        $totalBookLiquidated = $amountLiquidated + $amountOrderLiquidated;

        $newImportBook = ImportBook::with('book:id,b_name')->orderByDesc('created_at')->limit(30)->get();
        $readersViolated = Order::with('reader:id,r_name', 'book:id,b_name')->whereIn('d_status', [3,4])->orWhere('d_expiry_date', '<', date('Y-m-d'))->orderByDesc('id')->limit(30)->get();
        $readersBorrowing = Order::with('reader:id,r_name', 'book:id,b_name')->where('d_status', 1)->orWhere('d_expiry_date', '>', date('Y-m-d'))->orderByDesc('id')->limit(30)->get();
        $viewData = [
            'amountReader' => $amountReader,
            'totalBook' => $totalBook,
            'totalBookLiquidated' => $totalBookLiquidated,
            'totalBookBorrowing' => $totalBookBorrowing,
            'newImportBook' => $newImportBook,
            'readersViolated' => $readersViolated,
            'readersBorrowing' => $readersBorrowing
        ];
        return view('backend.dashboard', $viewData);
    }
}

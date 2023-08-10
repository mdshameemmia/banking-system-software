<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'Desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function deposit()
    {
        $transactions = Transaction::orderBy('id', 'Desc')->where('transaction_type', 'deposit')->get();
        return view('transactions.deposit', compact('transactions'));
    }

    public function depositCreate()
    {
        $transaction_types = User::TRANSACTION_TYPE;
        $users = User::all();
        return view('transactions.deposit-create', compact('transaction_types', 'users'));
    }

    public function depositStore(Request $request)
    {
        try {
            $data = $request->all();
            $user = User::find($request->user_id);
            $user->balance = $request->amount + $user->balance;
            $user->save();

            Transaction::create($data);

            return redirect()->route('deposit.index')->withMessage('Successfully deposit');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function withdrawal()
    {
        $transactions = Transaction::orderBy('id', 'Desc')->where('transaction_type', 'withdrawal')->get();
        return view('transactions.withdrawal', compact('transactions'));
    }


    public function withdrawalCreate()
    {
        $transaction_types = User::TRANSACTION_TYPE;
        $users = User::all();
        return view('transactions.withdrawal-create', compact('transaction_types', 'users'));
    }

    public function withdrawalStore(Request $request)
    {
        try {
            $data = $request->all();

            $user = User::find($request->user_id);

            if ($user->balance < $request->amount) {
                return redirect()->route('users.index')->withMessage("Your money is shorter than your withdrawal amount");
            }

            $today = date('D', strtotime(now()));
            $current_month  = date('m', strtotime(now()));

            $firstFiveThousandTransactionEachMonth = Transaction::where('user_id', $user->id)
                ->where('amount', 1000)
                ->where('transaction_type', 'withdrawal')
                ->whereMonth('date', $current_month)
                ->count();



            if ($firstFiveThousandTransactionEachMonth <= 5 && ($today == 'Fri' || $data['amount'] == 1000)) {
                Transaction::create($data);
            } else {
                if ($user->account_type == 'individual') {
                    $fee = $data['amount'] * (0.015/100);
                    $amount = $data['amount'] - $fee;
                    $data['amount'] = $amount;
                    $data['fee'] = $fee;
                    Transaction::create($data);
                } else {

                    // Decrease the withdrawal fee to 0.015% for Business accounts after a total withdrawal of 50K.
                    $fee = 0;
                    if ($data['amount'] == '50000') {
                        $fee = $data['amount'] * (0.015/100);
                    } else {
                        $fee = $data['amount'] * (0.025/100);
                    }

                    $amount = $data['amount'] - $fee;
                    $data['amount'] = $amount;
                    $data['fee'] = $fee;

                    Transaction::create($data);
                }
            }

            // user balance update 
            $user->balance = $user->balance  - $request->amount;
            $user->save();


            return redirect()->route('withdrawal.index')->withMessage('Successfully withdrawal');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}

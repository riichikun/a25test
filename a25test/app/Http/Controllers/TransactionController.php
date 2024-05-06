<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Employee;
use App\Models\Transaction;

class TransactionController extends Controller
{
    const SALARY = 300;
    public function store(TransactionRequest $request): string {
        $transaction = (new Transaction($request->validated()))->save();
        return json_encode(['successful transaction' => (bool)$transaction]);
    }

    public function show(TransactionRequest $request): string {
        $sum = Employee::findOrFail($request->validated()['employee_id'])->transactions()->sum('hours') * self::SALARY;
        return json_encode([
            $request['employee_id'] => $sum
        ]);
    }

    public function delete(TransactionRequest $request): string {
        $deletedTransactions = Employee::findOrFail($request['employee_id'])->transactions()->delete();
        return json_encode([
            'everything is payed' => (bool)$deletedTransactions
        ]);
    }

}

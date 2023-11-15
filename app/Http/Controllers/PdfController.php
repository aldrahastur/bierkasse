<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function usersBalance()
    {

        $users = User::with('wallet')->get();

        $data = [];

        foreach ($users as $user) {
            $completeUserBalance[] = [
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'balance' => $user->balanceFloat.' €',
            ];
        }

        $data['users'] = $completeUserBalance;

        $pdf = Pdf::loadView('pdf.users-balance', $data);

        return $pdf->download('invoice.pdf');
    }
}

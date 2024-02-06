<?php

namespace App\Console\Commands;

use App\Models\Fees;
use App\Models\User;
use Illuminate\Console\Command;

class CreateMonthlyFees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-monthly-fees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly Auto Fees Generator';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $students = User::where('role_id', 3)->where('status', 1)->where('pay_status', 1)->get();

        foreach ($students as $student) {
            $existingFee = Fees::where('student_id', $student->id)
                ->where('month', now()->format('F'))
                ->where('year', now()->year)
                ->first();
            if (!$existingFee) {
                Fees::create([
                    'student_id' => $student->id,
                    'fees_amount' => $student->fees_amount,
                    'month' => now()->format('F'), // Current month
                    'year' => now()->year,
                    'pay_status' => 0, // Default status as unpaid
                ]);
            }
        }

        $this->info('Monthly fees entries created successfully.');
    }
}

<?php

use App\SaleReportsDaily;
use Illuminate\Database\Seeder;
use Laravel\Cashier\Subscription;

class SaleReportsDailyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = Subscription::all();

        $totals = array();

        foreach ($subscriptions as $subscription) {

            $day = $subscription->created_at->format('Y-m-d');
            $quantity = $subscription->quantity;

            if (array_key_exists($day,$totals)) {
                $totals[$day] = $totals[$day] + $quantity;
            } else {
                $totals[$day] = $quantity;
            }
        }

        foreach ($totals as $day => $total) {
            $rd = new SaleReportsDaily();
            $rd->day = $day;
            $rd->total = $total;
            $rd->save();
        }
    }
}

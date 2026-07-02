<?php

namespace App\Models;

use Laravel\Cashier\Subscription as CashierSubscription;

class Subscription extends CashierSubscription
{
  protected $fillable = [
    "user_id",
    "type",
    "stripe_id",
    "stripe_status",
    "stripe_price",
    "quantity",
    "trial_ends_at",
    "ends_at",
    "plan_id",
    "current_period_start",
    "current_period_end",
  ];

  protected function casts(): array
  {
    return [
      "current_period_start" => "datetime",
      "current_period_end" => "datetime",
    ];
  }

  public function plan()
  {
    return $this->belongsTo(Plan::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}

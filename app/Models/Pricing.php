<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pricing extends Model
{
    protected $fillable = [
        'package_type',
        'package_id',

        'jan_resident_price', 'jan_foreign_price', 'jan_discount',
        'feb_resident_price', 'feb_foreign_price', 'feb_discount',
        'mar_resident_price', 'mar_foreign_price', 'mar_discount',
        'apr_resident_price', 'apr_foreign_price', 'apr_discount',
        'may_resident_price', 'may_foreign_price', 'may_discount',
        'jun_resident_price', 'jun_foreign_price', 'jun_discount',
        'jul_resident_price', 'jul_foreign_price', 'jul_discount',
        'aug_resident_price', 'aug_foreign_price', 'aug_discount',
        'sep_resident_price', 'sep_foreign_price', 'sep_discount',
        'oct_resident_price', 'oct_foreign_price', 'oct_discount',
        'nov_resident_price', 'nov_foreign_price', 'nov_discount',
        'dec_resident_price', 'dec_foreign_price', 'dec_discount',
    ];

    /**
     * Polymorphic relationship to either Tour or Hotel.
     */
    public function package()
    {
        return $this->morphTo();
    }

    /**
     * Get the resident, foreign prices, and discount for the current or specified month.
     *
     * @param  int|null $month The month number (1 = January, 12 = December). Defaults to the current month.
     * @return array
     */
    public function getMonthlyPricing(int $month = null)
    {
        // Default to the current month if no month is specified
        $month = $month ?? Carbon::now()->month;

        // Map the month to the appropriate column names
        $monthName = strtolower(Carbon::createFromFormat('!m', $month)->format('M'));

        return [
            'resident_price' => $this->getAttribute("{$monthName}_resident_price"),
            'foreign_price' => $this->getAttribute("{$monthName}_foreign_price"),
            'discount' => $this->getAttribute("{$monthName}_discount"),
        ];
    }

    /**
     * Accessor to automatically return the current month's pricing data.
     *
     * @return array
     */
    public function getCurrentMonthPricingAttribute()
    {
        return $this->getMonthlyPricing();
    }

    /**
     * Accessor to return specific month's pricing when accessed dynamically.
     *
     * @param  int $month The month number (1-12).
     * @return array
     */
    public function getMonthPricing(int $month)
    {
        return $this->getMonthlyPricing($month);
    }
}
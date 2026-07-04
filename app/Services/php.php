<?php

enum DiscountType 
{
    case Standard;
    case Seasonal;
    case Weight;
}

function getDiscountedPrice(float $cartWeight, float $totalPrice, 
                            DiscountType $discountType): float
{
    switch($discountType) {
        case DiscountType::Standard : 
        return $totalPrice * 0.9;
        case DiscountType::Seasonal : 
        return $totalPrice * 0.88;
        case DiscountType::Weight : 
        $discount = $cartWeight * 1.5;
        return $totalPrice - $discount;

        default : return $totalPrice;
    } 
   
}

echo getDiscountedPrice(12, 100, DiscountType::Weight);
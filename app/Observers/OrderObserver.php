<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * @param Order $order
     * @return void
     */
    public function creating(Order $order): void
    {
        // If quantity of product is less than quantity of order, throw exception
        foreach ($order->items as $orderItem) {
            $product = $orderItem->product;
            if ($product->qty < $orderItem->quantity) {
                throw new \Exception('Not enough stock for product: ' . $product->name);
            }
        }
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // Update inventory and total_price and shipping_cost
        $orderItems = $order->items;
        $totalPrice = 0;
        $shippingCost = 0;

        foreach ($orderItems as $orderItem) {
            $totalPrice += $orderItem->price * $orderItem->quantity;
            $shippingCost += $totalPrice * 0.1; // 10% shipping cost

            // Update inventory
            $product = $orderItem->product;
            $product->qty -= $orderItem->quantity;
            $product->save();
        }

        $order->total_price = $totalPrice;
        $order->shipping_cost = $shippingCost;
        $order->save();
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}

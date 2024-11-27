<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Log::info('Product has been created at:' . now() . ' with ID:' . $product->id);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        Log::info('Product has been update at:' . now() . ' with ID:' . $product->id);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        Log::info('Product has been deleted at:' . now() . ' with ID:' . $product->id);
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        Log::info('Product has been restored at:' . now() . ' with ID:' . $product->id);
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        Log::info('Product has been forceDeleted at:' . now() . ' with ID:' . $product->id);
    }
}

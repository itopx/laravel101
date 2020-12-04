<?php
namespace Modules\Product\Observers;

use Modules\Product\Entities\Product;

class ProductObserver
{

    function _genNoIndex($prefixed = "", $number = "")
    {
        return $prefixed . sprintf("%04d", $number);
    }

    /**
     * Handle the product "created" event.
     *
     * @param  Modules\Product\Entities\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        Product::where('id', $product->id)->update(['code' => $this->_genNoIndex("PRO", $product->id)]);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  Modules\Product\Entities\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  Modules\Product\Entities\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  Modules\Product\Entities\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  Modules\Product\Entities\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}

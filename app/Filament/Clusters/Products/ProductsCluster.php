<?php

namespace App\Filament\Clusters\Products;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ProductsCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;
    protected static string | UnitEnum | null $navigationGroup = 'Shop';
    protected static ?int $navigationSort = 0;
    protected static ?string $slug = 'shop/products';
}

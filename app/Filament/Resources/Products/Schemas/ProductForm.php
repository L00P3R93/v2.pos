<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Filament\Resources\Brands\RelationManagers\ProductsRelationManager;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Product Identity')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Set $set): void {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    })
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Product::class, 'slug', ignoreRecord: true)
                                    ->helperText('Auto-generated from the product name.'),

                                TextInput::make('sku')
                                    ->label('SKU')
                                    ->unique(Product::class, 'sku', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->default(fn () => 'SKU-'.strtoupper(Str::random(8)))
                                    ->helperText('Auto-generated — edit if needed.')
                                    ->required(),
                            ])
                            ->columns(2),

                        Section::make('Product Description')->schema([
                            MarkdownEditor::make('description')
                                ->columnSpan('full'),
                        ]),

                        Section::make('Product Images')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('media')
                                    ->collection('product-images')
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->reorderable()
                                    ->acceptedFileTypes(['image/jpeg'])
                                    ->hiddenLabel(),
                            ])
                            ->collapsible(),

                        Section::make('Pricing')
                            ->description('Set the selling price, compare-at price, and your cost.')
                            ->schema([
                                TextInput::make('price')
                                    ->label('Selling Price')
                                    ->prefix('KES')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                                    ->required(),

                                TextInput::make('old_price')
                                    ->label('Compare-at Price')
                                    ->prefix('KES')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                                    ->required(),

                                TextInput::make('cost')
                                    ->label('Cost per Item')
                                    ->prefix('KES')
                                    ->helperText('Never shown to customers.')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                                    ->required(),
                            ])
                            ->columns(3),

                        Section::make('Inventory')
                            ->schema([
                                TextInput::make('barcode')
                                    ->label('Barcode (ISBN, UPC, GTIN…)')
                                    ->unique(Product::class, 'barcode', ignoreRecord: true)
                                    ->maxLength(255),

                                TextInput::make('qty')
                                    ->label('Quantity in Stock')
                                    ->numeric()
                                    ->rules(['integer', 'min:0'])
                                    ->required(),

                                TextInput::make('security_stock')
                                    ->label('Low-Stock Alert Threshold')
                                    ->helperText('You\'ll be alerted when stock drops to this level.')
                                    ->numeric()
                                    ->rules(['integer', 'min:0'])
                                    ->required(),
                            ])
                            ->columns(3),

                        Section::make('Shipping & Returns')
                            ->schema([
                                Checkbox::make('requires_shipping')
                                    ->label('This product requires shipping'),

                                Checkbox::make('backorder')
                                    ->label('Allow returns for this product'),
                            ])
                            ->collapsed()
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_visible')
                                    ->label('Visible')
                                    ->helperText('This product will be hidden from all sales channels.')
                                    ->default(true),

                                DatePicker::make('published_at')
                                    ->label('Publishing date')
                                    ->default(now())
                                    ->required(),
                            ]),

                        Section::make('Associations')
                            ->schema([
                                Select::make('brand_id')
                                    ->relationship('brand', 'name')
                                    ->searchable()
                                    ->hiddenOn(ProductsRelationManager::class)
                                    ->createOptionForm([
                                        Section::make()
                                            ->schema([
                                                Grid::make()
                                                    ->schema([
                                                        TextInput::make('name')
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->live()
                                                            ->afterStateUpdated(fn ($state, Set $set) => $set('slug', Str::slug($state ?? ''))),

                                                        TextInput::make('slug')
                                                            ->disabled()
                                                            ->dehydrated()
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->unique(Brand::class, 'slug', ignoreRecord: true),
                                                    ]),
                                                TextInput::make('website')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->url(),

                                                Toggle::make('is_visible')
                                                    ->label('Visibility')
                                                    ->default(true),

                                                RichEditor::make('description'),
                                            ])
                                            ->columnSpan(['lg' => fn (?Brand $record) => $record === null ? 3 : 2]),
                                        Section::make()
                                            ->schema([
                                                TextEntry::make('created_at')
                                                    ->state(fn (Brand $record): ?string => $record->created_at?->diffForHumans()),

                                                TextEntry::make('updated_at')
                                                    ->label('Last modified at')
                                                    ->state(fn (Brand $record): ?string => $record->updated_at?->diffForHumans()),
                                            ])
                                            ->columnSpan(['lg' => 1])
                                            ->hidden(fn (?Brand $record) => $record === null),
                                    ])
                                    ->createOptionAction(function (Action $action) {
                                        $action
                                            ->modalHeading('Create New Brand')
                                            ->modalDescription('Create a new brand to be associated with this product')
                                            ->modalSubmitActionLabel('Create Brand');
                                    })
                                    ->required(),

                                Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->createOptionForm([
                                        Section::make()
                                            ->schema([
                                                Grid::make()
                                                    ->schema([
                                                        TextInput::make('name')
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->live(onBlur: true)
                                                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                                        TextInput::make('slug')
                                                            ->disabled()
                                                            ->dehydrated()
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->unique(Category::class, 'slug', ignoreRecord: true),
                                                    ]),

                                                Select::make('parent_id')
                                                    ->relationship('parent', 'name', fn (Builder $query) => $query->where('parent_id', null))
                                                    ->searchable()
                                                    ->placeholder('Select parent category'),

                                                Toggle::make('is_visible')
                                                    ->label('Visibility')
                                                    ->default(true),

                                                RichEditor::make('description'),
                                            ])
                                            ->columnSpan(['lg' => fn (?Category $record) => $record === null ? 3 : 2]),
                                        Section::make()
                                            ->schema([
                                                TextEntry::make('created_at')
                                                    ->state(fn (Category $record): ?string => $record->created_at?->diffForHumans()),

                                                TextEntry::make('updated_at')
                                                    ->label('Last modified at')
                                                    ->state(fn (Category $record): ?string => $record->updated_at?->diffForHumans()),
                                            ])
                                            ->columnSpan(['lg' => 1])
                                            ->hidden(fn (?Category $record) => $record === null),
                                    ])
                                    ->createOptionAction(function (Action $action) {
                                        $action
                                            ->modalHeading('Create New Category')
                                            ->modalDescription('Create a new category to be associated with this product')
                                            ->modalSubmitActionLabel('Create Category');
                                    })
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }
}

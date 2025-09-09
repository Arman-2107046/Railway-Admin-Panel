<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Enum\ProductGenderEnum;
use App\Enum\ProductCategoryEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Product Info')
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),

                                Forms\Components\Select::make('category')
                                    ->options([
                                        'knitwear' => 'Knitwear',
                                        'sweater' => 'Sweater',
                                        'woven-denim' => 'Woven Denim',
                                        'woven-non-denim' => 'Woven Non-Denim',
                                        'woven-outerwear' => 'Woven Outerwear',
                                        'activewear' => 'Activewear',
                                        'lingerie' => 'Lingerie',
                                        'workwear' => 'Workwear',
                                        'sleepwear' => 'Sleepwear',
                                        'leather-items' => 'Leather Items',
                                        'handicraft' => 'Handicraft',
                                        'home-textile' => 'Home Textile',
                                    ])
                                    ->required(),
                            ]),

                        Forms\Components\Section::make('Gender')
                            ->columns(2)
                            ->schema([
                                Forms\Components\Select::make('gender')
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                        'unisex' => 'Unisex',
                                        'kids' => 'Kids',
                                        'not-applicable' => 'Not Applicable',
                                    ])
                                    ->columnSpan(2) // full width
                                    ->required(),
                            ]),

                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('products')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->columnSpan(2),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('public')->height(50)->width(50),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category')->sortable(),
                Tables\Columns\TextColumn::make('gender')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

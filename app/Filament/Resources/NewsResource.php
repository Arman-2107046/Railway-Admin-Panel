<?php

namespace App\Filament\Resources;

use App\Enum\NewsTypeEnum;
use App\Enum\NewsCategoryEnum;
use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        protected static ?string $navigationLabel = 'Blogs';

        // protected static ?string $navigationGroup = 'Blog Section';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique(ignoreRecord: true)
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        // Auto-generate slug only if it's empty
                                        if (empty($get('slug'))) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->dehydrated()
                                    ->required()
                                    ->unique(ignoreRecord: true),


                                Forms\Components\TextInput::make('excerpt')
                                    ->columnSpan('2'),
                                Forms\Components\MarkdownEditor::make('content')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('body-image')
                                    ->fileAttachmentsVisibility('public')
                                    // ->toolbarButtons([
                                    //     'bold',
                                    //     'italic',
                                    //     'strike',
                                    //     'heading',
                                    //     'blockquote',
                                    //     'code',
                                    //     'link',
                                    //     'bullet-list',
                                    //     'ordered-list',
                                    //     'table',       // include table manually
                                    //     'horizontal-rule',
                                    //     'undo',
                                    //     'redo',
                                    //     // 'image',
                                    //     // 'attachFiles' 
                                    // ])
                                    ->columnSpan('2'),

                            ])->columns('2')


                    ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([


                                Forms\Components\Toggle::make('is_featured'),
                                Forms\Components\DatePicker::make('published_at'),

                                Forms\Components\Select::make('type')
                                    ->options([
                                        'Draft' => NewsTypeEnum::DRAFT->value,
                                        'Publish' => NewsTypeEnum::PUBLISH->value,

                                    ]),
                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Business & Industry' => NewsCategoryEnum::BUSINESS->value,
                                        'Techlonogy' => NewsCategoryEnum::TECHNOLOGY->value,
                                        'Sustainability & Trends' => NewsCategoryEnum::SUSTAINABILITY->value,
                                        'Education' => NewsCategoryEnum::EDUCATION->value,
                                        'Others' => NewsCategoryEnum::OTHERS->value,

                                    ]),



                            ]),


                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()                           // treat as image
                                    ->disk('public')                    // use storage/app/public
                                    ->directory('news')                 // storage/app/public/news
                                    ->visibility('public')              // make sure it’s public
                                    ->imageEditor()

                            ])




                    ])



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                // Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\ImageColumn::make('featured_image')
                    ->disk('public')
                    ->height(50)
                    ->width(50),




                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable(),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

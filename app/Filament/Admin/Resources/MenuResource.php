<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MenuResource\Pages;
use App\Filament\Admin\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;
    protected static ?string $navigationLabel = 'Menu';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([  
            Forms\Components\Select::make('idkategori')->relationship('kategori', 'nama_kategori')->required(),  
            Forms\Components\TextInput::make('nama_menu')->required(),  
            Forms\Components\TextInput::make('harga')->required()->numeric(),  
            Forms\Components\Textarea::make('deskripsi')->required(),  
            Forms\Components\FileUpload::make('foto')->nullable()->acceptedFileTypes(['image/*']),  
        ]);  
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idmenu'),  
                Tables\Columns\TextColumn::make('kategori.nama_kategori'),  
                Tables\Columns\TextColumn::make('nama_menu'),  
                Tables\Columns\TextColumn::make('harga'),  
                Tables\Columns\TextColumn::make('deskripsi'),  
                Tables\Columns\ImageColumn::make('foto'),  
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}

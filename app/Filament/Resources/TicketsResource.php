<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketsResource\Pages;
use App\Filament\Resources\TicketsResource\RelationManagers;
use App\Models\Tickets;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketsResource extends Resource
{
    protected static ?string $model = Tickets::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('product_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('assign_to')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('module_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->required(),
                Forms\Components\TextInput::make('db_location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('problem')
                    ->maxLength(1000)
                    ->default(null),
                Forms\Components\TextInput::make('technical_notes')
                    ->maxLength(1000)
                    ->default(null),
                Forms\Components\Toggle::make('is_done')
                    ->required(),
                Forms\Components\DateTimePicker::make('estimation_date'),
                Forms\Components\DateTimePicker::make('finish_date'),
                Forms\Components\TextInput::make('is_done_in_version')
                    ->maxLength(10)
                    ->default(null),
                Forms\Components\TextInput::make('program_version')
                    ->maxLength(10)
                    ->default(null),
                Forms\Components\Toggle::make('feedback_required')
                    ->required(),
                Forms\Components\TextInput::make('attachment')
                    ->maxLength(500)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assign_to')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('module_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('db_location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('problem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('technical_notes')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_done')
                    ->boolean(),
                Tables\Columns\TextColumn::make('estimation_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('finish_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_done_in_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('program_version')
                    ->searchable(),
                Tables\Columns\IconColumn::make('feedback_required')
                    ->boolean(),
                Tables\Columns\TextColumn::make('attachment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTickets::route('/create'),
            'edit' => Pages\EditTickets::route('/{record}/edit'),
        ];
    }
}

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
                Forms\Components\Select::make('company')
                    ->relationship('createdBy', 'company')
                    ->required(),
                Forms\Components\TextInput::make('contact_person')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('product')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('version_program')
                    ->maxLength(1000)
                    ->default(null),
                Forms\Components\Select::make('module')
                    ->relationship('module', 'name')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->options(array_combine(tickets::category, tickets::category))
                    ->required(),
                Forms\Components\Select::make('urgent_level')
                    ->options(array_combine(tickets::urgent_level, tickets::urgent_level))
                    ->required(),
                Forms\Components\TextInput::make('database_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('problem')
                    ->maxLength(1000)
                    ->default(null),
                Forms\Components\TextInput::make('attachment')
                    ->maxLength(500)
                    ->default(null),
                Forms\Components\TextInput::make('assign_to')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('assign_to_supervisor')
                    ->relationship('assignedTo', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('estimation_complation_date'),
                Forms\Components\TextInput::make('is_done_in_version')
                    ->maxLength(10)
                    ->default(null),
                Forms\Components\TextInput::make('program_version')
                    ->maxLength(10)
                    ->default(null),
                Forms\Components\TextInput::make('technical_note')
                    ->maxLength(1000)
                    ->default(null),
                Forms\Components\Toggle::make('is_done'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact person,')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('version_program')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('module')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('urgent_level'),
                Tables\Columns\TextColumn::make('database_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('problem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attachment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assign_to')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assign_to_supervisor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estimation_complation_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_done_in_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('program_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('technical_note')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_done')
                    ->boolean(),
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

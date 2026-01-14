<?php

namespace App\Filament\Resources\AuditLogs;

use App\Filament\Resources\AuditLogs\Pages\CreateAuditLog;
use App\Filament\Resources\AuditLogs\Pages\EditAuditLog;
use App\Filament\Resources\AuditLogs\Pages\ListAuditLogs;
use App\Filament\Resources\AuditLogs\Schemas\AuditLogForm;
use App\Filament\Resources\AuditLogs\Tables\AuditLogsTable;
use App\Models\AuditLog;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AuditLogResource extends Resource
{
    protected static ?string $model = AuditLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static string | UnitEnum | null $navigationGroup = 'System Management';
    protected static ?string $recordTitleAttribute = 'event';

    public static function form(Schema $schema): Schema
    {
        return AuditLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuditLogsTable::configure($table);
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
            'index' => ListAuditLogs::route('/'),
        ];
    }


    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('user.name')->label('User'),
            TextEntry::make('auditable_type')->label('Model'),
            TextEntry::make('event')->label('Event'),
            TextEntry::make('old_values')->label('Old Values')->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
            TextEntry::make('new_values')->label('New Values')->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
            TextEntry::make('ip_address')->label('IP'),
            TextEntry::make('created_at')->label('Created At'),
        ]);
    }
}

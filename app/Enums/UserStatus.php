<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum UserStatus: string implements HasLabel, HasColor, HasIcon
{
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
    case Suspended = 'suspended';
    case Deleted = 'deleted';
    case Blocked = 'blocked';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::Suspended => 'Suspended',
            self::Deleted => 'Deleted',
            self::Blocked => 'Blocked',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'info',
            self::Active => 'success',
            self::Inactive => 'warning',
            self::Suspended => 'primary',
            self::Deleted => 'secondary',
            self::Blocked => 'danger',
        };
    }

    public function getIcon(): Heroicon
    {
        return match ($this) {
            self::Pending => Heroicon::OutlinedShieldExclamation,
            self::Active => Heroicon::OutlinedCheckCircle,     // ✅ clearly means active/ok
            self::Inactive => Heroicon::OutlinedPauseCircle,   // ⏸️ paused/inactive
            self::Suspended => Heroicon::OutlinedExclamationCircle, // ⚠️ warning/suspended
            self::Deleted => Heroicon::OutlinedTrash,           // 🗑️ deleted
            self::Blocked => Heroicon::OutlinedXCircle,             // 🚫 blocked
        };
    }
}

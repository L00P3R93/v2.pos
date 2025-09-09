<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Filament\Resources\Orders\Schemas\OrderForm;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CreateOrder extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = OrderResource::class;

    public function form(Schema $schema): Schema
    {
        return parent::form($schema)->components([
            Wizard::make($this->getSteps())
                ->startOnStep($this->getStartStep())
                ->cancelAction($this->getCancelFormAction())
                ->submitAction($this->getSubmitFormAction())
                ->skippable($this->hasSkippableSteps())
                ->contained(false),
        ])->columns(null);
    }

    public function afterCreate(): void
    {
        $order = $this->record;
        $admins = User::role('Admin')->where('status', 'active')->get();
        Notification::make()
            ->title('New order')
            ->icon(Heroicon::OutlinedShoppingBag)
            ->body("**{$order->customer?->name} ordered {$order->items->count()} items.**")
            ->actions([
                Action::make('View')->url(OrderResource::getUrl('edit', ['record' => $order])),
            ])
            ->sendToDatabase($admins);
    }

    public function getSteps(): array
    {
        return [
            Step::make('Order Details')
                ->schema([
                    Section::make()
                        ->schema(OrderForm::getDetailsComponents())
                        ->columns(),
                ]),

            Step::make('Order Items')
                ->schema([
                    Section::make()
                        ->schema([OrderForm::getItemsRepeater()]),
                ]),
        ];
    }
}

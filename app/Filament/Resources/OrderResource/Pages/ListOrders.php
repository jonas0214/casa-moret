<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'pendientes_envio';
    }

    public function getTabs(): array
    {
        return [
            'pendientes_envio' => Tab::make('Pendientes de Envío')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'paid')->where('status', '!=', 'completed'))
                ->badge(fn () => \App\Models\Order::where('payment_status', 'paid')->where('status', '!=', 'completed')->count())
                ->badgeColor('warning'),
            'por_pagar' => Tab::make('Por Pagar')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', '!=', 'paid'))
                ->badge(fn () => \App\Models\Order::where('payment_status', '!=', 'paid')->count())
                ->badgeColor('danger'),
            'completados' => Tab::make('Envíos Realizados')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'completed'))
                ->badge(fn () => \App\Models\Order::where('status', 'completed')->count())
                ->badgeColor('success'),
        ];
    }
}

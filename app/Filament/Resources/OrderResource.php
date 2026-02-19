<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Ventas';
    protected static ?string $modelLabel = 'Pedido';
    protected static ?string $pluralModelLabel = 'Pedidos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalles del Pedido')
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->disabled()
                            ->label('Número de Pedido'),
                        Forms\Components\TextInput::make('status')
                            ->label('Estado del Pedido'),
                        Forms\Components\TextInput::make('payment_status')
                            ->label('Estado del Pago'),
                        Forms\Components\TextInput::make('total_amount')
                            ->numeric()
                            ->prefix('$')
                            ->disabled()
                            ->label('Total'),
                    ])->columns(2),

                Forms\Components\Section::make('Información del Cliente')
                    ->schema([
                        Forms\Components\TextInput::make('customer_name')
                            ->disabled()
                            ->label('Nombre'),
                        Forms\Components\TextInput::make('customer_email')
                            ->email()
                            ->disabled()
                            ->label('Email'),
                        Forms\Components\TextInput::make('customer_phone')
                            ->disabled()
                            ->label('Teléfono'),
                        Forms\Components\TextInput::make('shipping_address')
                            ->disabled()
                            ->label('Dirección de Envío'),
                        Forms\Components\TextInput::make('doc_type')
                            ->disabled()
                            ->label('Tipo de Documento'),
                        Forms\Components\TextInput::make('doc_number')
                            ->disabled()
                            ->label('Número de Documento'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Productos del Pedido')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->label('Producto')
                                    ->disabled(),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Cantidad')
                                    ->disabled(),
                                Forms\Components\TextInput::make('price_at_time')
                                    ->label('Precio Unitario')
                                    ->prefix('$')
                                    ->disabled(),
                            ])
                            ->columns(3)
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Pedido')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('COP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Pago')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'unpaid' => 'danger',
                        'paid' => 'success',
                        'failed' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pendiente',
                        'processing' => 'Procesando',
                        'completed' => 'Completado',
                        'cancelled' => 'Cancelado',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'unpaid' => 'No pagado',
                        'paid' => 'Pagado',
                        'failed' => 'Fallido',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            // Aquí podríamos agregar una relación para ver los items
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}

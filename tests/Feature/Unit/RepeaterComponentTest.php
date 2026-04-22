<?php

use Filament\Forms\Components\Repeater as BaseRepeater;
use Webkul\AdvanceTableRepeater\Forms\Components\Repeater;
use Webkul\AdvanceTableRepeater\Forms\Components\Repeater\TableColumn;

it('can be instantiated via make()', function () {
    expect(Repeater::make('lines'))->toBeInstanceOf(Repeater::class);
});

it('extends Filament Repeater', function () {
    expect(Repeater::make('lines'))->toBeInstanceOf(BaseRepeater::class);
});

it('exposes the table() fluent setter', function () {
    expect(method_exists(Repeater::class, 'table'))->toBeTrue();
});

it('exposes hasTableView / getTableColumns / getMappedColumns accessors', function () {
    $methods = get_class_methods(Repeater::class);

    expect($methods)->toContain('hasTableView');
    expect($methods)->toContain('getTableColumns');
    expect($methods)->toContain('getMappedColumns');
    expect($methods)->toContain('getSummaryForColumn');
    expect($methods)->toContain('hasAnySummarizers');
});

it('returns a fluent TableColumn from make()', function () {
    $col = TableColumn::make('qty')
        ->label('Quantity')
        ->markAsRequired()
        ->resizable()
        ->wrapHeader();

    expect($col)->toBeInstanceOf(TableColumn::class);
    expect($col->isResizable())->toBeTrue();
});

it('TableColumn exposes the expected fluent API', function () {
    $methods = get_class_methods(TableColumn::class);

    foreach (['make', 'hiddenHeaderLabel', 'markAsRequired', 'resizable', 'wrapHeader', 'getMinWidth', 'getMaxWidth'] as $m) {
        expect($methods)->toContain($m);
    }
});

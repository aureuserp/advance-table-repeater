<?php

use Filament\Infolists\Components\RepeatableEntry as BaseRepeatableEntry;
use Webkul\AdvanceTableRepeater\Infolists\Components\Repeater\TableColumn;
use Webkul\AdvanceTableRepeater\Infolists\Components\RepeatableEntry;

it('can be instantiated via make()', function () {
    expect(RepeatableEntry::make('lines'))->toBeInstanceOf(RepeatableEntry::class);
});

it('extends Filament RepeatableEntry', function () {
    expect(RepeatableEntry::make('lines'))->toBeInstanceOf(BaseRepeatableEntry::class);
});

it('exposes the table() fluent setter + table accessors', function () {
    $methods = get_class_methods(RepeatableEntry::class);

    expect($methods)->toContain('table');
    expect($methods)->toContain('hasTableView');
    expect($methods)->toContain('getTableColumns');
    expect($methods)->toContain('toEmbeddedTableHtml');
    expect($methods)->toContain('getSummaryForColumn');
    expect($methods)->toContain('hasAnySummarizers');
});

it('returns a fluent infolist TableColumn from make()', function () {
    $col = TableColumn::make('qty')->label('Quantity')->hiddenHeaderLabel();

    expect($col)->toBeInstanceOf(TableColumn::class);
    expect($col->getLabel())->toBe('Quantity');
    expect($col->isHeaderLabelHidden())->toBeTrue();
});

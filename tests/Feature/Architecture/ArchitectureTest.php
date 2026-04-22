<?php

use Filament\Contracts\Plugin;
use Filament\Forms\Components\Repeater as BaseRepeater;
use Filament\Infolists\Components\RepeatableEntry as BaseRepeatableEntry;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webkul\AdvanceTableRepeater\Concerns\CanBeHidden;
use Webkul\AdvanceTableRepeater\Concerns\CanBeSummarized;
use Webkul\AdvanceTableRepeater\Forms\Components\Repeater as FormRepeater;
use Webkul\AdvanceTableRepeater\Forms\Components\Repeater\TableColumn as FormTableColumn;
use Webkul\AdvanceTableRepeater\Infolists\Components\Repeater\TableColumn as InfolistTableColumn;
use Webkul\AdvanceTableRepeater\Infolists\Components\RepeatableEntry;
use Webkul\AdvanceTableRepeater\Summarizers\Average;
use Webkul\AdvanceTableRepeater\Summarizers\Count;
use Webkul\AdvanceTableRepeater\Summarizers\Range;
use Webkul\AdvanceTableRepeater\Summarizers\Sum;
use Webkul\AdvanceTableRepeater\Summarizers\Summarizer;
use Webkul\AdvanceTableRepeater\AdvanceTableRepeaterPlugin;
use Webkul\AdvanceTableRepeater\AdvanceTableRepeaterServiceProvider;

it('form Repeater extends Filament BaseRepeater', function () {
    expect(is_subclass_of(FormRepeater::class, BaseRepeater::class))->toBeTrue();
});

it('infolist RepeatableEntry extends Filament BaseRepeatableEntry', function () {
    expect(is_subclass_of(RepeatableEntry::class, BaseRepeatableEntry::class))->toBeTrue();
});

it('plugin implements Filament Plugin contract', function () {
    expect(in_array(Plugin::class, class_implements(AdvanceTableRepeaterPlugin::class), true))->toBeTrue();
});

it('service provider extends Spatie PackageServiceProvider', function () {
    expect(is_subclass_of(AdvanceTableRepeaterServiceProvider::class, PackageServiceProvider::class))->toBeTrue();
});

it('remaining concerns exist as traits', function () {
    expect(trait_exists(CanBeHidden::class))->toBeTrue();
    expect(trait_exists(CanBeSummarized::class))->toBeTrue();
});

it('Repeater exposes column-manager methods to Livewire via native Filament attribute', function () {
    $apply = new ReflectionMethod(FormRepeater::class, 'applyTableColumnManager');
    $reset = new ReflectionMethod(FormRepeater::class, 'resetTableColumnManager');

    expect($apply->getAttributes(ExposedLivewireMethod::class))->not->toBeEmpty();
    expect($reset->getAttributes(ExposedLivewireMethod::class))->not->toBeEmpty();
});

it('RepeatableEntry exposes column-manager methods to Livewire via native Filament attribute', function () {
    $apply = new ReflectionMethod(RepeatableEntry::class, 'applyTableColumnManager');
    $reset = new ReflectionMethod(RepeatableEntry::class, 'resetTableColumnManager');

    expect($apply->getAttributes(ExposedLivewireMethod::class))->not->toBeEmpty();
    expect($reset->getAttributes(ExposedLivewireMethod::class))->not->toBeEmpty();
});

it('all summarizer classes exist and extend the base Summarizer', function () {
    expect(class_exists(Summarizer::class))->toBeTrue();
    expect(is_subclass_of(Sum::class, Summarizer::class))->toBeTrue();
    expect(is_subclass_of(Count::class, Summarizer::class))->toBeTrue();
    expect(is_subclass_of(Average::class, Summarizer::class))->toBeTrue();
    expect(is_subclass_of(Range::class, Summarizer::class))->toBeTrue();
});

it('both TableColumn variants resolve', function () {
    expect(class_exists(FormTableColumn::class))->toBeTrue();
    expect(class_exists(InfolistTableColumn::class))->toBeTrue();
});

arch('no debug calls leak into shipped code')
    ->expect('Webkul\\TableRepeater')
    ->not->toUse(['dd', 'dump', 'var_dump', 'ray', 'die', 'exit']);

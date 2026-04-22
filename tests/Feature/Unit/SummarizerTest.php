<?php

use Webkul\AdvanceTableRepeater\Summarizers\Average;
use Webkul\AdvanceTableRepeater\Summarizers\Count;
use Webkul\AdvanceTableRepeater\Summarizers\Range;
use Webkul\AdvanceTableRepeater\Summarizers\Sum;

it('every summarizer can be instantiated via make()', function () {
    expect(Sum::make())->toBeInstanceOf(Sum::class);
    expect(Count::make())->toBeInstanceOf(Count::class);
    expect(Average::make())->toBeInstanceOf(Average::class);
    expect(Range::make())->toBeInstanceOf(Range::class);
});

it('summarizers support chainable label()', function () {
    expect(Sum::make()->label('Total'))->toBeInstanceOf(Sum::class);
    expect(Count::make()->label('Items'))->toBeInstanceOf(Count::class);
});

it('summarizer base class is abstract for subclassing', function () {
    expect((new ReflectionClass(\Webkul\AdvanceTableRepeater\Summarizers\Summarizer::class))->isAbstract())->toBeTrue();
});

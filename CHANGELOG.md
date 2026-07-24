# 🚀 CHANGELOG — v1.0.0

### 🧩 Features

* Initial release of the **Advance Table Repeater** plugin for Filament v5.
* Table-view `Repeater` (forms) extending `Filament\Forms\Components\Repeater` — renders a repeater as a table with per-column headers instead of the default stacked layout.
* Table-view `RepeatableEntry` (infolists) extending `Filament\Infolists\Components\RepeatableEntry` — read-only table rendering with the same visual, plus `toEmbeddedTableHtml()` for embedding a single row (e.g. in mail templates).
* Fluent `TableColumn` definition for both forms and infolists — `label()`, `hiddenHeaderLabel()`, `markAsRequired()`, `resizable()`, `wrapHeader()`, and min/max width constraints.
* Drag-and-drop row reordering and resizable columns out of the box.
* Column manager modal to toggle column visibility, persisted in session across reloads.
* Summarizers rendered in a sticky table footer via the `Summarizer` abstract and the `Sum`, `Count`, `Average`, and `Range` implementations, each supporting `label()`.
* `CanBeHidden` and `CanBeSummarized` concerns for building column behaviour.
* `AdvanceTableRepeaterPlugin` for registering the plugin with a Filament panel.
* `AdvanceTableRepeaterServiceProvider` with auto-discovery and publishable, customisable CSS assets.
* Publishable configuration file (`config/advance-table-repeater.php`) and publishable Blade views.
* Zero model coupling — pure Filament infrastructure, reusable in any app.
* Full Pest test coverage.

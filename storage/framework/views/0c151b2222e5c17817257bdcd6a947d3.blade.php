<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<x-heroicon-o-bars-3-bottom-right  {{ $attributes }}>

{{ $slot ?? "" }}
</x-heroicon-o-bars-3-bottom-right>
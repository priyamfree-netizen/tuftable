<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('app.regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
<x-slot:subcopy>
@isset($actionText)
@lang(
    'messages.troubleClickingButton',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endisset
<div style="text-align:center; color:#aaa; font-size:11px; margin-top:12px; padding-top:8px; border-top:1px solid #eee;">
    Powered by <strong style="color:#888;">DNInfo</strong> &mdash; <a href="https://dninfo.in" style="color:#aaa; text-decoration:none;">dninfo.in</a>
</div>
</x-slot:subcopy>
</x-mail::message>

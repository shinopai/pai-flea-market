@props(['status']) @if ($status)
<div {{ $attributes->
  merge(['class' => 'font-medium text-sm text-green-600 flash-msg']) }}>
  {{ $status }}
</div>
@endif

<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['darkMode','form','tag','wire:click','href','target','type','color','keyBindings','tooltip','disabled','icon','size','dusk','class','outlined','iconPosition','iconPosition'])
<x-filament::button :dark-mode="$darkMode" :form="$form" :tag="$tag" :wire:click="$wireClick" :href="$href" :target="$target" :type="$type" :color="$color" :key-bindings="$keyBindings" :tooltip="$tooltip" :disabled="$disabled" :icon="$icon" :size="$size" :dusk="$dusk" :class="$class" :outlined="$outlined" :iconPosition="$iconPosition" :icon-position="$iconPosition" >

{{ $slot ?? "" }}
</x-filament::button>
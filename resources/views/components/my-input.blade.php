<div class="mt-4 block">
    <label for="" class="text-gray-800">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="h-12 rounded border-gray-300 p-3 w-full focus:border-0" value="{{ $value }}">
    @error($name) {{ $message }} @enderror
</div>

@props(['error' => 'name'])
@error($error)
<p class="text-sm text-red-700">{{ $message }}</p>
@enderror

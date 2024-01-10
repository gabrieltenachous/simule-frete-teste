<div class="mb-4">
   <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
   <input id="{{ $id }}" type="text" name="{{ $name }}" value="{{ old($name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
   @error($name)
       <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
   @enderror
</div>
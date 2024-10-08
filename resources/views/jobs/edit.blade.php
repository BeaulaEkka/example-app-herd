<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    <div>
        <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <form method="POST" action="/jobs/{{ $job->id }}">
            @csrf
            @method('PATCH')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">We just need a few details from you.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="title" id="title" value="{{ $job->title }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5  px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Teacher" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                @error('title')
                                    <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="sm:col-span-4">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <textarea type="text" name="description" id="description"
                                        class="block flex-1 border-0 bg-transparent py-1.5  px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Job Description" required>{{ $job->description }}</textarea>
                                </div>
                                <div class="mt-2">
                                    @error('description')
                                        <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="sm:col-span-4">
                            <label for="salary"
                                class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="salary" id="salary" value="{{ $job->salary }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5  px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="€60000 per year" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                @error('salary')
                                    <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="location"
                                class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="location" id="location" value="{{ $job->location }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5  px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Rotterdam" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                @error('location')
                                    <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                            <div class="mt-2">
                                <div class="my-8">
                                    @foreach ($tags as $tag)
                                        <label class="inline-flex items-center mb-2">
                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $selectedTagIds) ? 'checked' : '' }}>
                                            <span class="ml-2 mr-2 capitalize">{{ $tag->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                @error('tags')
                                    <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs/{{ $job->id }}"type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>

    </div>
</x-layout>

<x-layout>
    <x-slot:heading>
        Create Jobs
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
        <form method="POST" action="/jobs">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">We just need a few details from you.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- Title Field -->
                        <div class="sm:col-span-4">
                            <x-form-label for="title">Title</x-form-label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="title" id="title"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Teacher">
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-form-error name='title' />
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="sm:col-span-4">
                            <x-form-label for="description">Description</x-form-label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <textarea name="description" id="description"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Job Description"></textarea>
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-form-error name='description' />
                            </div>
                        </div>

                        <!-- Location Field -->
                        <div class="sm:col-span-4">
                            <x-form-label for="location">Location</x-form-label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="location" id="location"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Rotterdam">
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-form-error name='location' />
                            </div>
                        </div>

                        <!-- Salary Field -->
                        <div class="sm:col-span-4">
                            <x-form-label for="salary">Salary</x-form-label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="salary" id="salary"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-300 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="€60000 per year" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-form-error name='salary' />
                            </div>
                        </div>

                        <!-- Tags Field -->
                        <div class="sm:col-span-4">
                            <x-form-label for="tags">Tags</x-form-label>
                            <div class="my-8">
                                @foreach ($tags as $tag)
                                    <label class="inline-flex items-center mb-2">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                        <span class="ml-2 capitalize">{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <x-form-error name='tags' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</x-layout>

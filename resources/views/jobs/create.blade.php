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
                        <x-form-field>
                            <x-form-label for="title">Title</x-form-label>
                            <div class="mt-2">

                                <x-form-input name="title" id="title" placeholder="Teacher" />

                            </div>
                            <div class="mt-2">
                                <x-form-error name='title' />
                            </div>
                        </x-form-field>

                        <!-- Description Field -->
                        <x-form-field>
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
                        </x-form-field>

                        <!-- Location Field -->
                        <x-form-field>
                            <x-form-label for="location">Location</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="location" id="location" placeholder="Rotterdam" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='location' />
                            </div>
                        </x-form-field>

                        <!-- Salary Field -->
                        <x-form-field>
                            <x-form-label for="salary">Salary</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="salary" id="salary" placeholder="60,000" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='salary' />
                            </div>
                        </x-form-field>

                        <!-- Tags Field -->
                        <x-form-field>
                            <x-form-label for="tags">Tags</x-form-label>
                            <div class="my-8">
                                @foreach ($tags as $tag)
                                    <label class="inline-flex items-center mb-2">
                                        <x-form-input type='checkbox' name="tags[]" value="{{ $tag->id }}" /><span
                                            class="mr-4 ml-1 capitalize ">{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <x-form-error name='tags' />
                            </div>
                        </x-form-field>

                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>

                <x-form-button type='submit'>Save</x-form-button>
            </div>
        </form>
    </div>
</x-layout>

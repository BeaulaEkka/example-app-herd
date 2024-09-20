<x-layout>
    <x-slot:heading>
        Login
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
        <form method="POST" action="/login">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <!-- Email Field -->
                        <x-form-field>
                            <x-form-label for="salary">Email</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="email" id="email" type="email" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='email' />
                            </div>
                        </x-form-field>

                        <!-- password Field -->
                        <x-form-field>
                            <x-form-label for="salary">Password</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="password" id="password" type="password" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='password' />
                            </div>
                        </x-form-field>

                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <x-form-button type='submit'>Log In</x-form-button>
            </div>
        </form>
    </div>
</x-layout>

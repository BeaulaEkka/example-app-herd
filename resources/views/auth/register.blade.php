{{-- <x-layout>
    <x-slot:heading>
        Register
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
        <form method="POST" action="/register">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- First Name Field -->
                        <x-form-field>
                            <x-form-label for="title">First Name</x-form-label>
                            <div class="mt-2">

                                <x-form-input name="first_name" id="first_name" />

                            </div>
                            <div class="mt-2">
                                <x-form-error name='first_name' />
                            </div>
                        </x-form-field>

                        <!-- last Name Field -->
                        <x-form-field>
                            <x-form-label for="location">Last Name</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="last_name" id="last_name" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='last_name' />
                            </div>
                        </x-form-field>

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

                        <!--Confirm Password Field -->
                        <x-form-field>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="password_confirmation" id="password_confirmation" type="password" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='password_confirmation' />
                            </div>
                        </x-form-field>

                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <x-form-button type='submit'>Register</x-form-button>
            </div>
        </form>
    </div>
</x-layout> --}}

<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <div>
        <form method="POST" action="/register">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- First Name Field -->
                        <x-form-field>
                            <x-form-label for="first_name">First Name</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="first_name" id="first_name" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='first_name' />
                            </div>
                        </x-form-field>

                        <!-- Last Name Field -->
                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="last_name" id="last_name" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='last_name' />
                            </div>
                        </x-form-field>

                        <!-- Email Field -->
                        <x-form-field>
                            <x-form-label for="email">Email</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="email" id="email" type="email" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='email' />
                            </div>
                        </x-form-field>

                        <!-- Password Field -->
                        <x-form-field>
                            <x-form-label for="password">Password</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="password" id="password" type="password" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='password' />
                            </div>
                        </x-form-field>

                        <!-- Confirm Password Field -->
                        <x-form-field>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="password_confirmation" id="password_confirmation" type="password" />
                            </div>
                            <div class="mt-2">
                                <x-form-error name='password_confirmation' />
                            </div>
                        </x-form-field>

                        <!-- Role Selection -->
                        <x-form-field>
                            <x-form-label for="role">Register as:</x-form-label>
                            <div class="mt-2">
                                <select name="role" id="role"
                                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="job_seeker">Job Seeker</option>
                                    <option value="employer">Employer</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-form-error name='role' />
                            </div>
                        </x-form-field>

                        <!-- Company Name Field (shown only if the user selects Employer) -->
                        <div id="company_name_field" class="hidden">
                            <x-form-field>
                                <x-form-label for="company_name">Company Name</x-form-label>
                                <div class="mt-2">
                                    <x-form-input name="company_name" id="company_name" />
                                </div>
                                <div class="mt-2">
                                    <x-form-error name='company_name' />
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button type='submit'>Register</x-form-button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            const companyNameField = document.getElementById('company_name_field');
            if (this.value === 'employer') {
                companyNameField.classList.remove('hidden');
            } else {
                companyNameField.classList.add('hidden');
            }
        });
    </script>
</x-layout>

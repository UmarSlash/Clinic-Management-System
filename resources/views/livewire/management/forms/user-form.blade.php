<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
    <div class="container mx-auto p-4">
        <div class="flex justify-end">
            <x-clinic.flash-success/>
        </div>
        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6" x-data="userForm()">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                @if ($user->exists)
                    Edit User Information
                @else
                    Add New User
                @endif
            </h1>
            <form>
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                        <input type="text" id="name" name="name" wire:model="name" required
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                        @if ($user->exists)
                            <input type="email" id="email" name="email" wire:model="email" required
                                class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @else
                            <input type="email" id="email" name="email" wire:model="email" required
                                x-model="email" @input="password = email"
                                class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @endif

                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone
                            No:</label>
                        <input type="text" id="phone" name="phone" wire:model="phone_no" required
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @error('phone_no')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="gender"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender:</label>
                        <select id="gender" name="gender" wire:model="gender" required
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (!$user->exists)
                    <div class="mb-4">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password:</label>
                        <input type="text" id="password" name="password" x-model="password" readonly
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-400">
                    </div>
                @endif
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles:</label>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="admin" name="roles[]" value="admin" wire:model="roles"
                            class="mr-2">
                        <label for="admin" class="text-sm">Admin</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="staff" name="roles[]" value="staff" wire:model="roles"
                            @click="toggleField('staff')" class="mr-2">
                        <label for="staff" class="text-sm">Staff</label>
                    </div>
                    <div x-show="isStaff" class="mb-4">
                        <label for="job"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job:</label>
                        <input type="text" id="job" name="job" wire:model="job"
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @error('job')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="doctor" name="roles[]" value="doctor" wire:model="roles"
                            @click="toggleField('doctor')" class="mr-2">
                        <label for="doctor" class="text-sm">Doctor</label>
                    </div>
                    <div x-show="isDoctor" class="mb-4">
                        <label for="specialty"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Specialty:</label>
                        <input type="text" id="specialty" name="specialty" wire:model="specialty"
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @error('specialty')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="patient" name="roles[]" value="patient" wire:model="roles"
                            @click="toggleField('patient')" class="mr-2">
                        <label for="patient" class="text-sm">Patient</label>
                    </div>
                    <div x-show="isPatient" class="mb-4">
                        <label for="ic"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">IC:</label>
                        <input type="text" id="ic" name="ic" wire:model="ic"
                            class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        @error('ic')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button wire:click="save" type="button"
                    class="relative h-12 px-4 py-2 overflow-hidden border border-teal-500 bg-teal-500 text-white font-bold rounded flex items-center transition-all shadow-2xl before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:bg-teal-700 hover:shadow-teal-500 hover:before:-translate-x-40">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>{{ $user->exists ? __('Update') : __('Add') }}</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        function userForm() {
            return {
                email: '',
                password: '',
                isStaff: false,
                isDoctor: false,
                isPatient: false,
                toggleField(role) {
                    if (role === 'staff') this.isStaff = !this.isStaff;
                    if (role === 'doctor') this.isDoctor = !this.isDoctor;
                    if (role === 'patient') this.isPatient = !this.isPatient;
                }
            }
        }
    </script>
</div>

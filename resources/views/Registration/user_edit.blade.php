<x-layout>
    <style>
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-mesh {
            background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh flex items-center justify-center p-6">
        <div class="max-w-2xl w-full">

            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <div class="px-8 pt-8 pb-6">
                    <h1 class="text-2xl font-bold text-white">Edit User</h1>
                    <p class="text-sm text-indigo-300">Update user information</p>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-2 gap-4">

                            <input type="text" name="first_name" placeholder="First Name"
                                class="input-style" value="{{ $user->first_name }}" required>

                            <input type="text" name="last_name" placeholder="Last Name"
                                class="input-style" value="{{ $user->last_name }}" required>

                            <input type="text" name="middle_name" placeholder="Middle Name"
                                class="input-style" value="{{ $user->middle_name }}">

                            <input type="text" name="nickname" placeholder="Nickname"
                                class="input-style" value="{{ $user->nickname }}">

                            <input type="email" name="email" placeholder="Email"
                                class="input-style col-span-2" value="{{ $user->email }}" required>

                            <input type="number" name="age" placeholder="Age"
                                class="input-style" value="{{ $user->age }}">

                            <input type="text" name="contact_number" placeholder="Contact Number"
                                class="input-style" value="{{ $user->contact_number }}">

                            <input type="text" name="address" placeholder="Address"
                                class="input-style col-span-2" value="{{ $user->address }}">

                            <input type="password" name="password" placeholder="Password"
                                class="input-style col-span-2">

                            <p class="col-span-2 text-sm text-slate-400">Leave password blank to keep current</p>

                        </div>

                        <div class="mt-6 text-right">
                            <button class="btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <style>
        .input-style {
            width: 100%;
            background: rgba(2,6,23,0.5);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 10px;
            border-radius: 10px;
            color: white;
        }

        .input-style:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99,102,241,0.3);
        }

        .btn-primary {
            background: #6366f1;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: #4f46e5;
        }
    </style>
</x-layout>
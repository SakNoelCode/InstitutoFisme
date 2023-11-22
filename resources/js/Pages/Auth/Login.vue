<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Inicio de sesión" />

    <!--AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard---->

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    Iniciar sesión
                </p>
            </header>
            <div class="card-content">

                <form @submit.prevent="submit()">

                    <div class="field spaced">
                        <label class="label" for="email">Correo eléctronico</label>
                        <div class="control icons-left">
                            <input id="email" v-model="form.email" class="input" type="email" placeholder="admin@untrm.com"
                                required autofocus autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                        </div>
                        <p class="help">
                            Porfavor ingrese un correo válido
                        </p>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="field spaced">
                        <label class="label" for="password">Contraseña</label>
                        <p class="control icons-left">
                            <input id="password" v-model="form.password" class="input" type="password"
                                placeholder="Password" required autocomplete="current-password">
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                        </p>
                        <p class="help">
                            Porfavor ingrese su contraseña
                        </p>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="field spaced">
                        <div class="control">
                            <label class="checkbox"><input v-model="form.remember" type="checkbox" name="remember" value="1"
                                    checked>
                                <span class="check"></span>
                                <span class="control-label">Recuerdamé</span>
                            </label>
                        </div>
                    </div>

                    <hr>

                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button blue" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Iniciar sesión
                            </button>
                        </div>
                        <div class="control">
                            <Link href="/" class="button">
                            Volver
                            </Link>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</template>

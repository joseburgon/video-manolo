<template>
    <div class="container max-w-full mx-auto md:py-24 px-6">
        <div class="max-w-sm mx-auto px-6">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div class="md:mt-6">
                        <div class="text-center font-semibold text-3xl">
                            VideoManolo
                        </div>
                        <div class="text-center font-base">
                            ¡Bienvenido a bordo!
                        </div>
                        <form class="mt-8">
                            <div class="mx-auto max-w-lg ">
                                <div class="py-1">
                                    <span class="px-1 text-sm">Nombre</span>
                                    <input class="text-md block px-3 py-2 rounded-lg w-full text-gray-900
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="" type="text"
                                           v-model="form.name">
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm">Email</span>
                                    <input class="text-md block px-3 py-2 rounded-lg w-full text-gray-900
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="" type="email"
                                           v-model="form.email">
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm">Contraseña</span>
                                    <input class="text-md block px-3 py-2 rounded-lg w-full text-gray-900
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="" type="password"
                                           v-model="form.password">
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm">Confirmar Contraseña</span>
                                    <input class="text-md block px-3 py-2 rounded-lg w-full text-gray-900
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="" type="password"
                                           v-model="form.password_confirmation">
                                </div>
                                <button @click.prevent="register" class="mt-3 text-lg bg-orange-500 text-gray-900 rounded font-semibold w-full text-white
                                    px-6 py-3 block shadow-xl hover:bg-orange-600">
                                    Registrarme
                                </button>
                            </div>
                        </form>

                        <div class="text-sm font-semibold block sm:hidden py-6 flex justify-center">
                            <a class="text-black font-normal border-b-2 border-gray-200 hover:border-teal-500"
                               href="#">
                                ¿Ya eres miembro?
                                <span class="text-black font-semibold">Login</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import User from "../apis/User";

export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            },
            errors: []
        };
    },

    methods: {
        register() {
            User.register(this.form)
                .then(() => {
                    this.$router.push({name: "login", query: {email: this.form.email}});
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        }
    }
};
</script>

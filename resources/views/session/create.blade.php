<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg m-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-200" >

            <h1 class="text-center text-xl font-bold">Log In!</h1>

            <form method='POST' action="/login " class="mt-10">

                @csrf
                <x-form.input name="email" type="email" autocomplete="username"/>

                <x-form.input name="password" type="password" autocomplete="password"/>



                <x-form.button> Log in </x-form.button>




        </main>
    </section>
 </x-layout>

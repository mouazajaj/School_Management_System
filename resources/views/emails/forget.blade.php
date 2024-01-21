<x-mail::message>
    Hello {{$user->name}},

    we understand it happends

    <x-mail::button :url="url('reset/'.$user->remember_token)">
        Rest your password
    </x-mail::button>

    in case you have any issues recovering your password,please contact us
    Thanks,
    {{ config('app.name') }}
</x-mail::message>
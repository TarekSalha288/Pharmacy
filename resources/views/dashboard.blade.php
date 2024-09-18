<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}<br>
                    @if (Auth::user()->status==1)
                        <a href="{{route('show')}}">Show</a><br>
                         <a href="{{route('create')}}">Create New Medicine</a><br>
                          <a href="{{route('request')}}">Show {{Auth::User()->unreadnotifications->count()}} Waiting Requests</a><br>
                           <a href="{{route('archive')}}">Archive</a><br>
                           <a href="{{route('sending')}}">Sending Requests</a><br>
                           <a href="{{route('receiving')}}">Receiving Requests</a><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

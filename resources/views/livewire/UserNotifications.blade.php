<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => []
]);

mount(function () {
    $this->loadNotifications();
});

$loadNotifications = function () {
    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
};

$markAsRead = function ($notification_id) {
    $notification = auth()
        ->user()
        ->notifications()
        ->where('id', $notification_id)
        ->first();

    $notification->markAsRead();

    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
};

?>

<div x-data="{
    init(){

        Pusher.logToConsole = true;

        var pusher = new Pusher('50a2e6693f94dde830f7', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('notification-channel');
        channel.bind('refresh-notifications', function(data) {
            @this.call('loadNotifications');
        });
    }
}">
    <div class="ms-3 relative">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-teal-700 text-sm font-medium rounded-md text-teal-500 bg-black hover:text-teal-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 transition ease-in-out duration-150">
                        Notifications ({{ $notifications->count() }})
                        <svg class="ms-2 -me-0.5 h-4 w-4 text-teal-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs font-semibold text-gray-300 border-b border-gray-700">
                    {{ __('Notifications') }}
                </div>

                <ul class="max-h-60 overflow-auto divide-y divide-gray-700">
                    @foreach($notifications as $notification)
                        <li class="{{ !$notification->read_at ? 'bg-teal-700' : 'bg-black' }} flex justify-between items-center p-4 hover:bg-gray-700 transition duration-150">
                            <a href="{{ $notification->data['action'] }}"
                               class="flex items-center space-x-3 text-sm text-teal-300 hover:text-teal-200 w-full">

                                @if($notification->data['icon'] == 'info')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" class="w-6 h-6 text-teal-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                    </svg>
                                @endif

                                <span>{{ $notification->data['message'] }}</span>
                            </a>
                            <button type="button" wire:click="markAsRead('{{ $notification->id }}')"
                                    class="text-teal-500 hover:text-teal-300 transition duration-150 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </x-slot>
        </x-dropdown>
    </div>
</div>

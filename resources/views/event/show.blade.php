<x-app-layout :edition="$edition">
    <x-slot name="header">
        <h4> {{ $edition->year }} / {{ $category->name }} / {{ $cluster->name }} / {{ $event->name }} </h4>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->name }}
        </h1>
    </x-slot>

    <div class="event-page">
        <div class="event-image"></div>
        <div class="tab-container" x-data="{ tab: window.location.hash ? window.location.hash : '#description' }">

            <div class="tab-header-container">
                <a id="description" class="tab-header" :class="{ 'active': tab === '#description' }" href="#description"
                    x-on:click="tab='#description'">Description</a>
                <a id="format" class="tab-header" :class="{ 'active': tab === '#format' }" href="#format"
                    x-on:click="tab='#format'">Format</a>
                <a id="rules" class="tab-header" :class="{ 'active': tab === '#rules' }" href="#rules"
                    x-on:click="tab='#rules'">Rules</a>
                <a id="resources" class="tab-header" :class="{ 'active': tab === '#faq' }" href="#faq"
                    x-on:click="tab='#faq'">FAQ</a>
                <a id="registration" class="tab-header" :class="{ 'active': tab === '#registration' }"
                    href="#registration" x-on:click="tab='#registration'">Registration</a>
            </div>
            <br>
            <div x-show="tab == '#description'" x-cloak>
                <p>{{ $event->description }}</p>
            </div>

            <div x-show="tab == '#format'" x-cloak>
                <p>
                <ul>
                    @foreach ($event->stages as $stage)
                    <li>
                        <div class="text-2xl"> {{ $stage->name }} </div>
                        <div class="text-sm"> {{ date("F j, Y, g:i a T", strtotime($stage->start_time)) }} - {{ date("F
                            j, Y, g:i a T", strtotime($stage->end_time)) }} </div>
                        <div class="text-lg"> {{ $stage->description }} </div>
                    </li>
                    <br>
                    @endforeach
                </ul>
                </p>
            </div>

            <div x-show="tab == '#rules'" x-cloak>
                <p>{{ $event->rules }}</p>
            </div>

            <div x-show="tab == '#faq'" x-cloak>
                <p>
                <ul>
                    @foreach ($event->faqs as $faq)
                    <li>
                        <div class="text-2xl"> Q: {{ $faq->question }} </div>
                        <div class="text-sm"> A: {{ $faq->answer }} </div>
                        <br>
                    </li>
                    <br>
                    @endforeach
                </ul>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

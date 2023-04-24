<x-app-layout :edition="$edition">
    <x-slot name="header">
        <h1 class="event-page-header-text">
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
            <div class="description-tab" x-show="tab == '#description'" x-cloak>
                <p>{{ $event->description }}</p>
            </div>

            <div class="format-tab" x-show="tab == '#format'" x-cloak>
                <p>
                <ul>
                    @foreach ($event->stages as $stage)
                        <li class="stage">
                            <div class="stage-name"> {{ $stage->name }} </div>
                            <div class="stage-duration"> {{ date('F j, Y, g:i a T', strtotime($stage->start_time)) }} -
                                {{ date(
                                    "F
                                                                                                                                                                                                                                                                                                                                                                                                                                                            j, Y, g:i a T",
                                    strtotime($stage->end_time),
                                ) }}
                            </div>
                            <div class="stage-description"> {{ $stage->description }} </div>
                        </li>
                        <br>
                    @endforeach
                </ul>
                </p>
            </div>

            <div class="rules-tab" x-show="tab == '#rules'" x-cloak>
                <p>{{ $event->rules }}</p>
            </div>

            <div class="faq-tab" x-show="tab == '#faq'" x-cloak>
                <p>
                <ul>
                    @foreach ($event->faqs as $faq)
                        <li>
                            <div class="faq-question"> Q: {{ $faq->question }} </div>
                            <div class="faq-answer"> A: {{ $faq->answer }} </div>
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

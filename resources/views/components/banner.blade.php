@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div class="banner" x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
    :class="{
        'banner-success': style == 'success',
        'banner-danger': style == 'danger',
        'banner-info': style != 'success' &&
            style != 'danger'
    }"
    style="display: none;" x-show="show && message" x-init="document.addEventListener('banner-message', event => {
        style = event.detail.style;
        message = event.detail.message;
        show = true;
    });">
    <div class="banner-container">
        <div class="banner-message-container">
            <p class="banner-message-text" x-text="message"></p>
        </div>
        <button type="button" class="banner-button" aria-label="Dismiss" x-on:click="show = false">
            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

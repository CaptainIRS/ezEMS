<div class="auth-providers-divider">
    <hr class="left">
    {{ __('Or') }}
    <hr class="right">
</div>

<div class="oauth-auth-providers">
    @if (JoelButcher\Socialstream\Socialstream::hasFacebookSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::facebook()]) }}">
            <x-facebook-icon class="auth-provider-icon" />
            <span class="auth-provider-name">Facebook</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()]) }}">
            <x-google-icon class="auth-provider-icon" />
            <span class="auth-provider-name">Google</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGithubSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::github()]) }}">
            <x-github-icon class="auth-provider-icon" />
            <span class="auth-provider-name">GitHub</span>
        </a>
    @endif
</div>

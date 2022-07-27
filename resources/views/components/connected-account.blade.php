@props(['provider', 'createdAt' => null])

<div>
    <div class="connected-account">
        <div class="connected-account-container">
            @switch($provider)
                @case(JoelButcher\Socialstream\Providers::facebook())
                    <x-facebook-icon class="provider-icon" />
                @break

                @case(JoelButcher\Socialstream\Providers::google())
                    <x-google-icon class="provider-icon" />
                @break

                @case(JoelButcher\Socialstream\Providers::github())
                    <x-github-icon class="provider-icon" />
                @break

                @default
            @endswitch

            <div>
                <div class="provider-name">
                    {{ __(ucfirst($provider)) }}
                </div>

                @if (!empty($createdAt))
                    <div class="provider-connect-status">
                        Connected {{ $createdAt }}
                    </div>
                @else
                    <div class="provider-connect-status">
                        {{ __('Not connected.') }}
                    </div>
                @endif
            </div>
        </div>

        <div>
            {{ $action }}
        </div>
    </div>

    @error($provider . '_connect_error')
        <div class="connect-error">
            {{ $message }}
        </div>
    @enderror
</div>

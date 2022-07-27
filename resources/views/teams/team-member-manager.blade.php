<div>
    @if (Gate::check('addTeamMember', $team))
        <x-section-border />

        <!-- Add Team Member -->
        <div class="team-form-section">
            <x-form-section submit="addTeamMember">
                <x-slot name="title">
                    {{ __('Add Team Member') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add a new team member to your team, allowing them to collaborate with you.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="form-info-container">
                        <div class="form-info-content">
                            {{ __('Please provide the email address of the person you would like to add to this team.') }}
                        </div>
                    </div>

                    <!-- Member Email -->
                    <div class="team-input-group">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" type="email" class="team-text-input"
                            wire:model.defer="addTeamMemberForm.email" />
                        <x-input-error for="email" class="team-text-input-error" />
                    </div>

                    <!-- Role -->
                    @if (count($this->roles) > 0)
                        <div class="team-roles-container">
                            <x-label for="role" value="{{ __('Role') }}" />
                            <x-input-error for="role" class="team-text-input-error" />

                            <div class="team-roles-list">
                                @foreach ($this->roles as $index => $role)
                                    <button type="button"
                                        class="team-role-item {{ $index > 0 ? 'team-role-item-not-first' : '' }} {{ !$loop->last ? 'team-role-item-not-last' : '' }} {{ isset($addTeamMemberForm['role']) && $addTeamMemberForm['role'] !== $role->key ? 'team-role-item-inactive' : '' }}"
                                        wire:click="$set('addTeamMemberForm.role', '{{ $role->key }}')">
                                        <div class="">
                                            <!-- Role Name -->
                                            <div class="role-name-container">
                                                <div
                                                    class="role-name-text {{ $addTeamMemberForm['role'] == $role->key ? 'role-name-text-active' : '' }}">
                                                    {{ $role->name }}
                                                </div>

                                                @if ($addTeamMemberForm['role'] == $role->key)
                                                    <svg class="active-role-check-mark" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                @endif
                                            </div>

                                            <!-- Role Description -->
                                            <div class="role-description">
                                                {{ $role->description }}
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </x-slot>

                <x-slot name="actions">
                    <x-action-message on="saved">
                        {{ __('Added.') }}
                    </x-action-message>

                    <x-button>
                        {{ __('Add') }}
                    </x-button>
                </x-slot>
            </x-form-section>
        </div>
    @endif

    @if ($team->teamInvitations->isNotEmpty() && Gate::check('addTeamMember', $team))
        <x-section-border />

        <!-- Team Member Invitations -->
        <div class="team-form-section">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Pending Team Invitations') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation.') }}
                </x-slot>

                <x-slot name="content">
                    <div class="pending-invitations-container">
                        @foreach ($team->teamInvitations as $invitation)
                            <div class="pending-invitation-item">
                                <div class="pending-invitation-email">{{ $invitation->email }}</div>

                                <div class="invitation-cancel-container">
                                    @if (Gate::check('removeTeamMember', $team))
                                        <!-- Cancel Team Invitation -->
                                        <button class="invitation-cancel-button"
                                            wire:click="cancelTeamInvitation({{ $invitation->id }})">
                                            {{ __('Cancel') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    @if ($team->users->isNotEmpty())
        <x-section-border />

        <!-- Manage Team Members -->
        <div class="team-form-section">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Team Members') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('All of the people that are part of this team.') }}
                </x-slot>

                <!-- Team Member List -->
                <x-slot name="content">
                    <div class="team-members-container">
                        @foreach ($team->users->sortBy('name') as $user)
                            <div class="team-member-item">
                                <div class="team-member-info-container">
                                    <img class="team-member-image" src="{{ $user->profile_photo_url }}"
                                        alt="{{ $user->name }}">
                                    <div class="team-member-name">{{ $user->name }}</div>
                                </div>

                                <div class="team-member-role-container">
                                    <!-- Manage Team Member Role -->
                                    @if (Gate::check('addTeamMember', $team) && Laravel\Jetstream\Jetstream::hasRoles())
                                        <button class="edit-member-role-button edit-member-role-button-editable"
                                            wire:click="manageRole('{{ $user->id }}')">
                                            {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }}
                                        </button>
                                    @elseif (Laravel\Jetstream\Jetstream::hasRoles())
                                        <div class="edit-member-role-button">
                                            {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }}
                                        </div>
                                    @endif

                                    <!-- Leave Team -->
                                    @if ($this->user->id === $user->id)
                                        <button class="team-member-delete-button"
                                            wire:click="$toggle('confirmingLeavingTeam')">
                                            {{ __('Leave') }}
                                        </button>

                                        <!-- Remove Team Member -->
                                    @elseif (Gate::check('removeTeamMember', $team))
                                        <button class="team-member-delete-button"
                                            wire:click="confirmTeamMemberRemoval('{{ $user->id }}')">
                                            {{ __('Remove') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    <!-- Role Management Modal -->
    <x-dialog-modal wire:model="currentlyManagingRole">
        <x-slot name="title">
            {{ __('Manage Role') }}
        </x-slot>

        <x-slot name="content">
            <div class="team-roles-list">
                @foreach ($this->roles as $index => $role)
                    <button type="button"
                        class="team-role-item {{ $index > 0 ? 'team-role-item-not-first' : '' }} {{ !$loop->last ? 'team-role-item-not-last' : '' }} {{ $currentRole !== $role->key ? 'team-role-item-inactive' : '' }}"
                        wire:click="$set('currentRole', '{{ $role->key }}')">
                        <div class="">
                            <!-- Role Name -->
                            <div class="role-name-container">
                                <div
                                    class="role-name-text {{ $currentRole == $role->key ? 'role-name-text-active' : '' }}">
                                    {{ $role->name }}
                                </div>

                                @if ($currentRole == $role->key)
                                    <svg class="active-role-check-mark" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @endif
                            </div>

                            <!-- Role Description -->
                            <div class="role-description">
                                {{ $role->description }}
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="stopManagingRole" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="updateRole" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Leave Team Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingLeavingTeam">
        <x-slot name="title">
            {{ __('Leave Team') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to leave this team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLeavingTeam')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button wire:click="leaveTeam" wire:loading.attr="disabled">
                {{ __('Leave') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <!-- Remove Team Member Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingTeamMemberRemoval">
        <x-slot name="title">
            {{ __('Remove Team Member') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this person from the team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingTeamMemberRemoval')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button wire:click="removeTeamMember" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>

@extends('base')


@section('content')
    <div class="page-content-inner">

            <!--Edit Profile-->
            <div class="account-wrapper">
                <div class="columns">

                    <!--Navigation-->
                    <div class="column is-4">
                        <div class="account-box is-navigation">
                            <div class="media-flex-center">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                                </div>
                                <div class="flex-meta">
                                    <span>{{ $user->fullName }}</span>
                                </div>
                            </div>

                            <div class="account-menu">
                                <a href="{{ route('profile.edit', ['profile'=>$user]) }}?step=1" class="account-menu-item is-active">
                                    <i class="lnil lnil-user-alt"></i>
                                    <span>Informations personnelles</span>
                                    <span class="end">
                                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                              </span>
                                </a>


                            </div>
                        </div>
                    </div>

                    <!--Form-->
                    <div class="column is-8">
                        <div class="account-box is-form is-footerless">
                            <div class="form-head stuck-header">
                                <div class="form-head-inner">
                                    <div class="left">
                                        <h3>Modifier mon profile</h3>
                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <button id="save-button" class="button h-button is-primary is-raised" onclick="$('#update_form').submit()">Enregistrer les modification</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <!--Fieldset-->
                                <div class="fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Photo de profile</h4>

                                    </div>

                                    <div class="h-avatar profile-h-avatar is-xl">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                        <div class="filepond-profile-wrap is-hidden">
                                            <input type="file" class="profile-filepond" name="profile_filepond" accept="image/png, image/jpeg, image/gif">
                                        </div>
                                        <button class="button is-circle edit-button is-edit">
                                                        <span class="icon is-small">
                                                          <i data-feather="edit-2"></i>
                                                      </span>
                                        </button>
                                        <button class="button is-circle edit-button is-back is-hidden">
                                                        <span class="icon is-small">
                                                          <i data-feather="arrow-left"></i>
                                                      </span>
                                        </button>
                                    </div>
                                </div>
                                <!--Fieldset-->
                                <livewire:update-profile-form :user="auth()->user()" />


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
@endsection

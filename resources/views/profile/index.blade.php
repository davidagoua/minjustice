@extends('base')


@section('content')

    <div class="page-content-inner">

            <!--User profile-->
            <div class="profile-wrapper">
                <div class="profile-header has-text-centered">
                    <div class="h-avatar is-xl">
                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="" data-user-popover="3">
                        <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                    </div>
                    <h3 class="title is-4 is-narrow is-thin">{{Str::title($user->fullName) }}</h3>

                    <div class="profile-stats">
                        <div class="profile-stat">
                            <i class="lnil lnil-users-alt"></i>
                            <span>500+ Relations</span>
                        </div>
                        <div class="separator"></div>
                        <div class="profile-stat">
                            <i class="lnil lnil-checkmark-circle"></i>
                            <span>78 Projects</span>
                        </div>
                        <div class="separator"></div>
                        <div class="socials">
                            <a><i aria-hidden="true" class="fab fa-facebook-f"></i></a>
                            <a><i aria-hidden="true" class="fab fa-twitter"></i></a>
                            <a><i aria-hidden="true" class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="profile-body">
                    <div class="columns">
                        <div class="column is-8">
                            <div class="profile-card">
                                <div class="profile-card-section">
                                    <div class="section-content">
                                        <p class="description text-3xl text-is-danger">Veuillez completer votre profile pour le certifié</p>
                                    </div>
                                </div>
                                <div class="profile-card-section">
                                    <div class="section-title">
                                        <h4>Informations personelles</h4>
                                    </div>
                                    <div class="section-content">
                                        <div class="experience-wrapper">
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->last_name }}</span>
                                                    <span>Nom</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->first_name }}</span>
                                                    <span>Prénoms</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->date_naissance }}</span>
                                                    <span>Date de naissance</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->lieu_naissance }}</span>
                                                    <span>Lieu de naissance</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->sexe }}</span>
                                                    <span>Genre</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->situation_matrimonial ?? "Autre" }}</span>
                                                    <span>Situation matrimoniale</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="profile-card-section">
                                    <div class="section-title">
                                        <h4>Informations filiations</h4>
                                    </div>
                                    <div class="section-content">
                                        <div class="experience-wrapper">
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->last_name_pere.' '.$user->first_name_pere }}</span>
                                                    <span>Nom du père</span>
                                                </div>
                                            </div>

                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->last_name_mere.' '.$user->first_name_mere }}</span>
                                                    <span>Nom de la mère</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->date_naissance_pere }}</span>
                                                    <span>Date de naissance du père</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->date_naissance_mere }}</span>
                                                    <span>Date de naissance du mère</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->lieu_naissance_pere }}</span>
                                                    <span>Lieu de naissance du père</span>
                                                </div>
                                            </div>
                                            <div class="experience-item">
                                                <div class="meta">
                                                    <span class="dark-inverted">{{ $user->lieu_naissance_mere }}</span>
                                                    <span>Lieu de naissance du mère</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more-button has-text-centered">
                                            <a class="button h-button is-primary" href="{{ route('profile.edit', ['profile'=>$user]) }}">
                                                <i class="lnil lnil-pencil"></i> &nbsp;
                                                <span class="is-white">Modifier</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="column is-4">

                            <!--Notifications-->
                            <div class="profile-card">
                                <div class="profile-card-section no-padding">
                                    <div class="section-title">
                                        <h4>Notifications</h4>
                                        <div class="control">
                                            <label class="form-switch is-success">
                                                <input type="checkbox" class="is-switch" checked="">
                                                <i></i>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Tools-->
                            <div class="profile-card">
                                <div class="profile-card-section no-padding">
                                    <div class="section-title">
                                        <h4>Tools</h4>
                                        <a href="/admin-profile-edit-2.html"><i class="lnil lnil-pencil"></i></a>
                                        <a class="action-link">View All</a>
                                    </div>
                                    <div class="section-content">

                                        <div class="tools-wrapper">
                                            <!--Tool-->
                                            <div class="tools-item flex justify-between">
                                                <div class="icon-wrap">
                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/stacks/illustrator.svg" alt="">
                                                    <span class="languages-donut" style="display: none;">80/100</span><svg class="peity" height="50" width="50"><path d="M 25 0 A 25 25 0 1 1 1.223587092621159 17.274575140626318 L 4.07675664150662 18.20162612375116 A 22 22 0 1 0 25 3" data-value="80" fill="#797bf2"></path><path d="M 1.223587092621159 17.274575140626318 A 25 25 0 0 1 24.999999999999996 0 L 24.999999999999996 3 A 22 22 0 0 0 4.07675664150662 18.20162612375116" data-value="20" fill="#efefef"></path></svg>
                                                </div>
                                                <div class="meta">
                                                    <span class="dark-inverted">Adobe Illustrator</span>
                                                </div>
                                                <div>
                                                    <button class="btn is-primary">Compléter</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection

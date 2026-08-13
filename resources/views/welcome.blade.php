<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Somba Market') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <script>
            (function () {
                try {
                    const storedTheme = localStorage.getItem('theme');
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    const theme = storedTheme === 'dark' || (!storedTheme && prefersDark) ? 'dark' : 'light';
                    document.documentElement.classList.toggle('dark', theme === 'dark');
                    document.documentElement.classList.toggle('light', theme !== 'dark');
                } catch (e) {
                    // ignore
                }
            })();
        </script>
        <style>
            :root {
                color-scheme: light;
            }
            .theme-transition {
                transition: background-color 0.35s ease, color 0.35s ease, border-color 0.35s ease, fill 0.35s ease, box-shadow 0.35s ease, transform 0.35s ease;
            }
            .card-fade {
                transition: transform 0.35s ease, box-shadow 0.35s ease;
            }
            .card-fade:hover {
                transform: translateY(-4px);
            }
            .scrollbar-none::-webkit-scrollbar {
                display: none;
            }
            .scrollbar-none {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900 transition duration-500 dark:bg-slate-950 dark:text-slate-100">
        <div class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
            <div class="absolute inset-x-0 top-0 h-72 bg-gradient-to-b from-sky-700 via-slate-800 to-transparent opacity-95 dark:from-slate-900 dark:via-slate-950"></div>
            <div class="relative mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <nav class="flex flex-col gap-4 rounded-[2rem] border border-slate-200/70 bg-white/80 px-5 py-4 shadow-xl shadow-slate-900/5 backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/90 sm:flex-row sm:items-center sm:justify-between sm:px-8 sm:py-5">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-gradient-to-br from-sky-600 to-violet-600 text-white shadow-lg shadow-slate-900/15">
                            <span class="text-xl font-bold">S</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Somba Market</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Le marché près de chez vous.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 text-sm font-medium text-slate-600 dark:text-slate-300">
                        <a href="#hero" class="hover:text-slate-900 dark:hover:text-white">Accueil</a>
                        <a href="#about" class="hover:text-slate-900 dark:hover:text-white">À propos</a>
                        <a href="#categories" class="hover:text-slate-900 dark:hover:text-white">Catégories</a>
                        <a href="#features" class="hover:text-slate-900 dark:hover:text-white">Fonctionnalités</a>
                        <a href="#stats" class="hover:text-slate-900 dark:hover:text-white">Chiffres</a>
                        <a href="#contact" class="hover:text-slate-900 dark:hover:text-white">Contact</a>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <button id="theme-toggle" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 dark:hover:border-slate-500 dark:hover:bg-slate-900">
                            <svg class="h-4 w-4 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414M18.364 18.364l-1.414-1.414M7.05 7.05L5.636 5.636" /></svg>
                            <svg class="h-4 w-4 hidden dark:inline-flex" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" /></svg>
                            <span>Mode</span>
                        </button>
                        <select class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 shadow-sm outline-none transition hover:border-slate-300 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 dark:hover:border-slate-500">
                            <option>FR</option>
                            <option>EN</option>
                        </select>
                        <a href="{{ route('login') }}" class="rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-slate-900/20 transition hover:bg-slate-800">Se connecter</a>
                    </div>
                </nav>

                <section id="hero" class="mt-10 grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                    <div class="space-y-8">
                        <div class="inline-flex rounded-full bg-sky-100 px-4 py-1 text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Marketplace locale premium</div>
                        <div>
                            <h1 class="text-4xl font-bold tracking-tight text-slate-950 dark:text-white sm:text-5xl">Le marché près de chez vous.</h1>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-600 dark:text-slate-300">Trouvez facilement des produits, commerces et services locaux, commandez en ligne, payez simplement et recevez vos achats ou services rapidement.</p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-[1.2fr_0.8fr]">
                            <a href="#about" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-sky-600 to-violet-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-600/20 transition hover:-translate-y-0.5 hover:shadow-sky-700/30">Découvrir Somba Market</a>
                            <a href="#features" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:border-slate-400 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800">Voir les fonctionnalités</a>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-white/90 p-5 shadow-xl shadow-slate-900/5 dark:border-slate-700/60 dark:bg-slate-900/90">
                            <div class="space-y-4">
                                <div class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Recherchez près de chez vous</div>
                                <div class="grid gap-4 sm:grid-cols-[1fr_0.3fr] lg:grid-cols-[1fr_0.28fr]">
                                    <input type="text" placeholder="Rechercher un produit, une boutique, un service..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-violet-500 dark:focus:ring-slate-800" />
                                    <button class="rounded-3xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Rechercher</button>
                                </div>
                                <div class="grid gap-3 sm:grid-cols-4">
                                    <span class="rounded-3xl bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-700 dark:bg-slate-800 dark:text-slate-200">Alimentation</span>
                                    <span class="rounded-3xl bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-700 dark:bg-slate-800 dark:text-slate-200">Santé</span>
                                    <span class="rounded-3xl bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-700 dark:bg-slate-800 dark:text-slate-200">Restaurant</span>
                                    <span class="rounded-3xl bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-700 dark:bg-slate-800 dark:text-slate-200">Quincaillerie</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                            <div class="rounded-3xl bg-white p-4 text-center shadow-sm shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <p class="text-3xl font-bold text-slate-900 dark:text-white">5 000+</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Commerces partenaires</p>
                            </div>
                            <div class="rounded-3xl bg-white p-4 text-center shadow-sm shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <p class="text-3xl font-bold text-slate-900 dark:text-white">50 000+</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Produits disponibles</p>
                            </div>
                            <div class="rounded-3xl bg-white p-4 text-center shadow-sm shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <p class="text-3xl font-bold text-slate-900 dark:text-white">100 000+</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Clients satisfaits</p>
                            </div>
                            <div class="rounded-3xl bg-white p-4 text-center shadow-sm shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <p class="text-3xl font-bold text-slate-900 dark:text-white">300+</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Villes couvertes</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative rounded-[2.5rem] bg-white/90 p-5 shadow-[0_30px_80px_-40px_rgba(15,23,42,0.35)] dark:bg-slate-950/90">
                        <div class="absolute inset-x-4 top-4 h-20 rounded-[2rem] bg-gradient-to-r from-sky-500 to-violet-600 opacity-15"></div>
                        <div class="relative z-10 grid gap-4">
                            <div class="rounded-[2rem] border border-slate-200/70 bg-slate-100 p-5 dark:border-slate-700/70 dark:bg-slate-900">
                                <div class="flex items-center justify-between">
                                    <span class="rounded-2xl bg-slate-900 px-3 py-1 text-xs font-semibold text-white">Somba Market</span>
                                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">RDC</span>
                                </div>
                                <div class="mt-5 rounded-[2rem] bg-white p-4 shadow-sm dark:bg-slate-950">
                                    <div class="h-56 overflow-hidden rounded-[1.75rem] bg-slate-200 dark:bg-slate-800">
                                        <img src="https://images.unsplash.com/photo-1525011268546-bf3bfae0d57f?auto=format;&fit=crop;&w=800;&q=80" alt="Application mobile commerce" class="h-full w-full object-cover" />
                                    </div>
                                    <div class="mt-4 space-y-3">
                                        <div class="rounded-3xl bg-slate-900/95 p-4 text-white shadow-lg shadow-slate-900/20">
                                            <p class="text-sm font-semibold">Livraison rapide</p>
                                            <p class="text-sm text-slate-300">Suivez vos commandes en temps réel.</p>
                                        </div>
                                        <div class="grid gap-3 sm:grid-cols-2">
                                            <div class="rounded-3xl bg-white p-3 text-sm font-semibold text-slate-900 shadow-sm dark:bg-slate-950 dark:text-slate-100">Pharmacie</div>
                                            <div class="rounded-3xl bg-white p-3 text-sm font-semibold text-slate-900 shadow-sm dark:bg-slate-950 dark:text-slate-100">Épicerie</div>
                                        </div>
                                        <div class="grid gap-3 sm:grid-cols-2">
                                            <div class="rounded-3xl bg-white p-3 text-sm font-semibold text-slate-900 shadow-sm dark:bg-slate-950 dark:text-slate-100">Restaurants</div>
                                            <div class="rounded-3xl bg-white p-3 text-sm font-semibold text-slate-900 shadow-sm dark:bg-slate-950 dark:text-slate-100">Quincaillerie</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 rounded-[2rem] border border-slate-200/70 bg-slate-50 p-5 dark:border-slate-700/70 dark:bg-slate-900">
                                <div class="flex items-center justify-between text-sm font-semibold text-slate-700 dark:text-slate-200">
                                    <span>Carte interactive</span>
                                    <span class="rounded-full bg-slate-200 px-3 py-1 text-xs dark:bg-slate-800">Proche de vous</span>
                                </div>
                                <div class="h-40 overflow-hidden rounded-[1.75rem] bg-slate-200 dark:bg-slate-800">
                                    <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format;&fit=crop;&w=800;&q=80" alt="Carte locale" class="h-full w-full object-cover" />
                                </div>
                                <div class="grid gap-3 sm:grid-cols-2">
                                    <div class="rounded-3xl bg-white p-3 text-sm text-slate-700 shadow-sm dark:bg-slate-950 dark:text-slate-200">Localiser un commerce</div>
                                    <div class="rounded-3xl bg-white p-3 text-sm text-slate-700 shadow-sm dark:bg-slate-950 dark:text-slate-200">Voir les offres</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="about" class="mt-16 space-y-8">
                    <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Une solution pour chaque besoin</p>
                            <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Une expérience pensée pour tous les acteurs du commerce local.</h2>
                            <p class="mt-4 max-w-2xl text-slate-600 dark:text-slate-300">Clients, commerçants, livreurs et administrateurs peuvent tous utiliser Somba Market facilement, sans se perdre dans des menus trop techniques.</p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-sky-50 p-3 text-sky-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-700 text-white">C</span>
                                    <div>
                                        <p class="text-sm font-semibold">Particuliers</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Achetez facilement des produits autour de vous.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-violet-50 p-3 text-violet-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-violet-700 text-white">V</span>
                                    <div>
                                        <p class="text-sm font-semibold">Commerçants</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Gérez votre boutique et vos commandes en quelques clics.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-emerald-50 p-3 text-emerald-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-700 text-white">E</span>
                                    <div>
                                        <p class="text-sm font-semibold">Entreprises</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Simplifiez l'achat de fournitures et services pour vos équipes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-amber-50 p-3 text-amber-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-amber-700 text-white">L</span>
                                    <div>
                                        <p class="text-sm font-semibold">Livreurs</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Recevez des missions et suivez vos livraisons en direct.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-cyan-50 p-3 text-cyan-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-cyan-700 text-white">P</span>
                                    <div>
                                        <p class="text-sm font-semibold">Prestataires</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Trouvez des clients pour vos services locaux.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-slate-100 p-3 text-slate-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-700 text-white">A</span>
                                    <div>
                                        <p class="text-sm font-semibold">Administrateurs</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Pilotez l'ensemble de la plateforme avec simplicité.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-slate-100 p-3 text-slate-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-700 text-white">I</span>
                                    <div>
                                        <p class="text-sm font-semibold">Institutions</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Suivez l'activité économique locale et soutenez les acteurs du marché.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                                <div class="flex items-center gap-3 rounded-3xl bg-slate-100 p-3 text-slate-700">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-700 text-white">As</span>
                                    <div>
                                        <p class="text-sm font-semibold">Associations</p>
                                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Appuyez vos communautés avec une plateforme simple et inclusive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="features" class="mt-16 space-y-10">
                    <div class="space-y-4 text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Fonctionnalités principales</p>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Tout ce dont le commerce local a besoin.</h2>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-sky-600 text-white shadow-lg shadow-sky-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h16" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Marketplace</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Multi-vendeur, catalogue produit et commandes centralisées.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-violet-600 text-white shadow-lg shadow-violet-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 3v18h14V3H5zm4 4h6M9 11h6M9 15h4" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Carte interactive</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Cherchez les commerces proches et visualisez les trajets.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-600 text-white shadow-lg shadow-emerald-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Paiements sécurisés</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Mobile Money, cartes et paiement à la livraison.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-amber-600 text-white shadow-lg shadow-amber-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7h18M5 11h14M9 15h10" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Livraison rapide</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Choisissez livraison à domicile ou retrait en boutique.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-600 text-white shadow-lg shadow-cyan-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2z" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Chat</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Échangez directement avec les commerçants et le support.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-700 text-white shadow-lg shadow-slate-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 12h2l3 3 4-8 2 4" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Suivi en temps réel</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Sachez où en est chaque commande et chaque livraison.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-indigo-600 text-white shadow-lg shadow-indigo-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Promotions ;& coupons</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Trouvez des offres spéciales et économisez sur vos achats.</p>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40 card-fade">
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-rose-600 text-white shadow-lg shadow-rose-900/20">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" /></svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-slate-950 dark:text-white">Avis et notes</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-400">Choisissez en confiance grâce aux avis des autres clients.</p>
                        </div>
                    </div>
                </section>

                <section id="categories" class="mt-16 space-y-8">
                    <div class="space-y-4 text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Catégories</p>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Les catégories les plus recherchées.</h2>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format;&fit=crop;&w=900;&q=80" alt="Alimentation" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Alimentation</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Fruits, légumes, épicerie et produits frais près de chez vous.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1580281658623-146dc0c9eb51?auto=format&fit=crop&w=900&q=80" alt="Santé" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Santé</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Pharmacies, produits de santé et conseils en quelques clics.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format;&fit=crop;&w=900;&q=80" alt="Maison" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Maison</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Mobilier, décoration et produits pour la maison.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format;&fit=crop;&w=900;&q=80" alt="Informatique" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Informatique</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Ordinateurs, téléphones et accessoires pour vos besoins numériques.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format;&fit=crop;&w=900;&q=80" alt="Services" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Services</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Électriciens, plombiers, photographes et bien d'autres.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1494522335800-4bd10f8ae0d3?auto=format;&fit=crop;&w=900;&q=80" alt="Tourisme" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Tourisme</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Hôtels, restaurants et expériences locales.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <img src="https://images.unsplash.com/photo-1457370643276-47c1c8b2e0dd?auto=format;&fit=crop;&w=900;&q=80" alt="Immobilier" class="h-56 w-full object-cover" />
                            <div class="p-6">
                                <p class="text-lg font-semibold text-slate-950 dark:text-white">Immobilier</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Maisons, terrains et biens immobiliers à découvrir.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="stats" class="mt-16 rounded-[2rem] border border-slate-200 bg-white/90 p-8 shadow-xl shadow-slate-900/5 dark:border-slate-700/60 dark:bg-slate-950 dark:shadow-slate-950/40">
                    <div class="grid gap-10 lg:grid-cols-4">
                        <div class="space-y-3 text-center">
                            <p class="text-4xl font-bold text-slate-950 dark:text-white">5 000+</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Commerces partenaires</p>
                        </div>
                        <div class="space-y-3 text-center">
                            <p class="text-4xl font-bold text-slate-950 dark:text-white">50 000+</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Produits disponibles</p>
                        </div>
                        <div class="space-y-3 text-center">
                            <p class="text-4xl font-bold text-slate-950 dark:text-white">100 000+</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Clients satisfaits</p>
                        </div>
                        <div class="space-y-3 text-center">
                            <p class="text-4xl font-bold text-slate-950 dark:text-white">300+</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Villes couvertes</p>
                        </div>
                    </div>
                </section>

                <section id="mobile" class="mt-16 grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                    <div class="space-y-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Application mobile</p>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Téléchargez l’application et commandez en quelques secondes.</h2>
                        <p class="max-w-2xl text-slate-600 dark:text-slate-300">Gérez vos achats, vos services et vos livraisons depuis votre téléphone. Disponible pour Android et iOS avec un accès simple et sécurisé.</p>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <a href="#" class="inline-flex items-center justify-center gap-2 rounded-full bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/20 transition hover:bg-slate-800">Google Play</a>
                            <a href="#" class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800">App Store</a>
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[2rem] bg-slate-950 p-6 text-white shadow-xl shadow-slate-950/40">
                            <div class="h-80 overflow-hidden rounded-[2rem] bg-slate-900">
                                <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format;&fit=crop;&w=800;&q=80" alt="Mockup smartphone application" class="h-full w-full object-cover" />
                            </div>
                        </div>
                        <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 dark:bg-slate-900 dark:shadow-slate-950/40">
                            <div class="grid h-full gap-5">
                                <div class="rounded-3xl border border-slate-200 p-6 dark:border-slate-700">
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Scannez le QR code</p>
                                    <div class="mt-4 flex items-center justify-center rounded-3xl bg-slate-100 p-4 dark:bg-slate-950">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150;&data=https://somba-market.example" alt="QR code Somba Market" class="h-36 w-36" />
                                    </div>
                                </div>
                                <div class="rounded-3xl bg-slate-100 p-5 dark:bg-slate-950">
                                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Disponible sur :</p>
                                    <div class="mt-4 grid gap-3">
                                        <div class="rounded-3xl bg-white p-4 shadow-sm dark:bg-slate-900">
                                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Android</p>
                                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Téléchargez depuis Google Play.</p>
                                        </div>
                                        <div class="rounded-3xl bg-white p-4 shadow-sm dark:bg-slate-900">
                                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">iOS</p>
                                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Disponible sur l'App Store.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <footer id="contact" class="mt-20 rounded-[2rem] border border-slate-200 bg-white/90 px-8 py-10 shadow-xl shadow-slate-900/5 dark:border-slate-700/60 dark:bg-slate-950 dark:shadow-slate-950/40">
                    <div class="grid gap-10 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-gradient-to-br from-sky-600 to-violet-600 text-white">S</div>
                                <div>
                                    <p class="text-lg font-semibold text-slate-950 dark:text-white">Somba Market</p>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Le marché près de chez vous.</p>
                                </div>
                            </div>
                            <p class="text-sm leading-7 text-slate-600 dark:text-slate-400">Une présence locale digitale pour tous les commerçants, clients et services en RDC et en Afrique.</p>
                        </div>
                        <div class="space-y-4">
                            <p class="font-semibold text-slate-900 dark:text-white">Somba Market</p>
                            <a href="#hero" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Accueil</a>
                            <a href="#about" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">À propos</a>
                            <a href="#categories" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Catégories</a>
                            <a href="#features" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Fonctionnalités</a>
                        </div>
                        <div class="space-y-4">
                            <p class="font-semibold text-slate-900 dark:text-white">Pour tous</p>
                            <a href="#" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Clients</a>
                            <a href="#" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Vendeurs</a>
                            <a href="#" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Livreurs</a>
                            <a href="#" class="block text-sm text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">Prestataires</a>
                        </div>
                        <div class="space-y-4">
                            <p class="font-semibold text-slate-900 dark:text-white">Restez informé</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Inscrivez-vous à notre newsletter et recevez les nouveautés.</p>
                            <form class="mt-4 flex flex-col gap-3 sm:flex-row">
                                <input type="email" placeholder="Votre email" class="w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:focus:border-violet-500 dark:focus:ring-slate-800" />
                                <button class="rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">S'inscrire</button>
                            </form>
                            <div class="flex items-center gap-3 pt-4 text-slate-500 dark:text-slate-400">
                                <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 transition hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700">F</a>
                                <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 transition hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700">T</a>
                                <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 transition hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700">I</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 border-t border-slate-200 pt-6 text-sm text-slate-500 dark:border-slate-700 dark:text-slate-400">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <p>© {{ date('Y') }} Somba Market. Tous droits réservés.</p>
                            <div class="flex flex-wrap items-center gap-4">
                                <a href="#" class="hover:text-slate-900 dark:hover:text-white">Mentions légales</a>
                                <a href="#" class="hover:text-slate-900 dark:hover:text-white">Confidentialité</a>
                                <a href="#" class="hover:text-slate-900 dark:hover:text-white">Cookies</a>
                                <a href="#" class="hover:text-slate-900 dark:hover:text-white">Français</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            const themeToggle = document.getElementById('theme-toggle');
            const root = document.documentElement;
            const storedTheme = localStorage.getItem('theme');
            const applyTheme = (theme) => {
                if (theme === 'dark') {
                    root.classList.add('dark');
                    root.classList.remove('light');
                    document.body?.classList.add('dark');
                    document.body?.classList.remove('light');
                    localStorage.setItem('theme', 'dark');
                } else {
                    root.classList.remove('dark');
                    root.classList.add('light');
                    document.body?.classList.remove('dark');
                    document.body?.classList.add('light');
                    localStorage.setItem('theme', 'light');
                }
            };
            if (storedTheme === 'dark') {
                applyTheme('dark');
            } else {
                applyTheme('light');
            }
            if (themeToggle) {
                themeToggle.addEventListener('click', () => {
                    const next = root.classList.contains('dark') ? 'light' : 'dark';
                    applyTheme(next);
                });
            }
        </script>
    </body>
</html>

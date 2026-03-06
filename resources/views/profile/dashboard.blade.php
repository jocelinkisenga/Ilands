<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">

        @if(!auth()->user()->subscribed('default'))
            {{-- VUE POUR UTILISATEUR NON ABONNÉ --}}
            <div class="card bg-base-100 shadow-xl border border-warning">
                <div class="card-body items-center text-center">
                    <h2 class="card-title text-2xl text-warning">Passez à la vitesse supérieure !</h2>
                    <p class="py-4">Votre compte actuel ne vous permet pas d'accéder aux analyses fiscales complètes. Abonnez-vous pour débloquer toutes nos fonctionnalités et sécuriser vos déclarations.</p>
                    <div class="card-actions justify-center mt-4">
                        <a href="{{ route('pricing') }}" class="btn btn-warning">Découvrir nos offres</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline">Gérer mon profil</a>
                    </div>
                </div>
            </div>

            {{-- Aperçu flouté / grisé pour donner envie --}}
            <div class="opacity-50 pointer-events-none mt-8">
                <div class="stats shadow w-full border border-base-200">
                    <div class="stat">
                        <div class="stat-title">Available Analyses</div>
                        <div class="stat-value">-- / --</div>
                    </div>
                </div>
            </div>

        @else
            {{-- VUE POUR UTILISATEUR ABONNÉ --}}
            
            {{-- En-tête de gestion d'abonnement --}}
            <div class="flex justify-between items-center bg-base-200 p-4 rounded-lg shadow-sm">
                <div>
                    <span class="font-bold text-success">✓ Abonnement Actif</span>
                    <span class="text-sm text-gray-500 ml-2">Renouvellement automatique activé</span>
                </div>
                <div class="space-x-2">
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline">Mon Profil</a>
                    {{-- Si vous avez implémenté le Billing Portal de Stripe --}}
                    {{-- <a href="{{ route('billing-portal') }}" class="btn btn-sm btn-primary">Gérer l'abonnement & Factures</a> --}}
                </div>
            </div>

            {{-- Statistiques --}}
            <div class="stats shadow w-full border border-base-200 mt-6">
                <div class="stat">
                    <div class="stat-title">Available Analyses</div>
                    <div class="stat-value text-primary">12 / 15</div>
                    <div class="stat-desc">Renewal on March 15</div>
                </div>
                <div class="stat">
                    <div class="stat-title">Overall Status</div>
                    <div class="stat-value text-success text-2xl">All up to date</div>
                    <div class="stat-desc font-bold">1 analysis pending validation</div>
                </div>
            </div>
            
            {{-- Tableau des analyses --}}
            <div class="card bg-base-100 shadow-xl border border-base-200 mt-6">
                <div class="card-body">
                    <h2 class="card-title justify-between">
                        My Tax Analyses
                        <a href="{{ route('tax-profile') }}" class="btn btn-primary btn-sm">+ New Analysis</a>
                    </h2>
                    
                    <div class="overflow-x-auto mt-4">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>AI Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($taxProfiles as $profile)
                                <tr>
                                    <td>26 Feb 2026</td>
                                    <td>Crypto Income</td>
                                    <td><span class="badge badge-warning">Human Validation</span></td>
                                    <td><progress class="progress progress-primary w-20" value="{{$profile->score}}" max="100"></progress> {{$profile->score}}%</td>
                                    <td><button class="btn btn-ghost btn-xs" disabled>Pending</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Timeline / Suivi --}}
            <div class="card bg-base-100 shadow-xl border border-base-200 mt-8">
                <div class="card-body">
                    <h2 class="card-title text-lg mb-4">Tracking your analysis #TX-882</h2>
                    
                    <ul class="timeline timeline-vertical">
                        <li>
                            <div class="timeline-start">Feb 26.</div>
                            <div class="timeline-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-success"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                            </div>
                            <div class="timeline-end timeline-box">Profile completed and secured</div>
                            <hr class="bg-success"/>
                        </li>
                        <li>
                            <hr class="bg-success"/>
                            <div class="timeline-start">Feb 26.</div>
                            <div class="timeline-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-success"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                            </div>
                            <div class="timeline-end timeline-box">AI analysis performed (92% Confidence)</div>
                            <hr class="bg-primary"/>
                        </li>
                        <li>
                            <hr class="bg-primary"/>
                            <div class="timeline-start">Pending</div>
                            <div class="timeline-middle">
                                <span class="loading loading-spinner loading-sm text-primary"></span>
                            </div>
                            <div class="timeline-end timeline-box italic">Validation by a tax expert</div>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
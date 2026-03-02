<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 <div class="p-6 space-y-6">
    <div class="stats shadow w-full border border-base-200">
        <div class="stat">
            <div class="stat-title">Analyses Disponibles</div>
            <div class="stat-value text-primary">12 / 15</div>
            <div class="stat-desc">Renouvellement le 15 Mars</div>
        </div>
        <div class="stat">
            <div class="stat-title">Statut Global</div>
            <div class="stat-value text-success text-2xl">Tout est à jour</div>
            <div class="stat-desc font-bold">1 analyse en attente de validation</div>
        </div>
    </div>
    
    <div class="card bg-base-100 shadow-xl border border-base-200">
        <div class="card-body">
            <h2 class="card-title justify-between">
                Mes Analyses Fiscales
                <a href="{{ route('tax-profile') }}" class="btn btn-primary btn-sm">+ Nouvelle Analyse</a>
            </h2>
            
            <div class="overflow-x-auto mt-4">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th>Score IA</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($taxProfiles as $profile)
                        <tr>
                            <td>26 Feb 2026</td>
                            <td>Revenus Crypto</td>
                            <td><span class="badge badge-warning">Validation Humaine</span></td>
                            <td><progress class="progress progress-primary w-20" value="88" max="100"></progress> {{$profile->score}}%</td>
                            <td><button class="btn btn-ghost btn-xs" disabled>En attente</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- logs --}}

<div class="card bg-base-100 shadow-xl border border-base-200 mt-8">
    <div class="card-body">
        <h2 class="card-title text-lg mb-4">Suivi de votre analyse #TX-882</h2>
        
        <ul class="timeline timeline-vertical">
            <li>
                <div class="timeline-start">26 Fév.</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-success"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end timeline-box">Profil complété et sécurisé</div>
                <hr class="bg-success"/>
            </li>
            <li>
                <hr class="bg-success"/>
                <div class="timeline-start">26 Fév.</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-success"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                <div class="timeline-end timeline-box">Analyse IA effectuée (Confiance 92%)</div>
                <hr class="bg-primary"/>
            </li>
            <li>
                <hr class="bg-primary"/>
                <div class="timeline-start">En attente</div>
                <div class="timeline-middle">
                    <span class="loading loading-spinner loading-sm text-primary"></span>
                </div>
                <div class="timeline-end timeline-box italic">Validation par un expert fiscaliste</div>
            </li>
        </ul>
    </div>
</div>
</x-app-layout>

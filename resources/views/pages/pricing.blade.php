@extends('layouts.guest')

@section('content')
<div class="py-24 bg-base-200 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-primary font-semibold tracking-wide uppercase">Tarification Claire</h2>
            <p class="mt-2 text-4xl font-extrabold text-base-content sm:text-5xl">
                Infrastructure FiscaleDurable
            </p>
            <p class="mt-4 max-w-2xl text-xl text-base-content/70 mx-auto">
               
            </p>
        </div>

        @include('components.plans')

        <p class="text-center mt-12 text-sm text-base-content/50 italic">
            Toutes nos offres incluent la politique de rétention et de backups automatisés prévue dans notre gouvernance IA.
        </p>
    </div>
</div>
@endsection
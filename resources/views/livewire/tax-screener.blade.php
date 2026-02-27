<div class="min-h-screen bg-black text-white flex flex-col items-center justify-center px-6 py-12">
    
    <div class="max-w-xl w-full">
        @if($step !== 'results')
            <div class="w-full bg-white/10 h-2 rounded-full mb-12">
                <div class="bg-green-500 h-2 rounded-full transition-all duration-500" style="width: {{ ($step / $totalSteps) * 100 }}%"></div>
            </div>
        @endif

        <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-3xl p-8 md:p-12 shadow-2xl">
            
            @if($step == 1)
                <h2 class="text-2xl font-bold mb-8">Quelle est votre source de revenus principale ?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model.live="income_source" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none text-white appearance-none">
                            <option value="">-- Sélectionnez une option --</option>
                            <option value="gig">Gig Economy (Uber, DoorDash, etc.)</option>
                            <option value="freelance">Freelance / Indépendant</option>
                            <option value="w2">Employé W-2 + Revenus annexes</option>
                            <option value="expat">Expatrié Américain</option>
                        </select>
                        @error('income_source') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <button wire:click="nextStep" @if(!$income_source) disabled @endif class="w-full bg-green-600 hover:bg-green-500 py-4 rounded-xl font-bold transition">
                        Suivant
                    </button>
                </div>

            @elseif($step == 2)
                <h2 class="text-2xl font-bold mb-8">Revenu annuel approximatif ?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model.live="annual_income" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none text-white appearance-none">
                            <option value="">-- Sélectionnez une tranche --</option>
                            <option value="<30k">Moins de $30,000</option>
                            <option value="30k-60k">De $30,000 à $60,000</option>
                            <option value="60k-100k">De $60,000 à $100,000</option>
                            <option value="100k+">Plus de $100,000</option>
                        </select>
                        @error('annual_income') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4">
                                <button wire:click="previousStep" class="w-1/3 bg-white/10 hover:bg-white/20 py-4 rounded-xl font-bold transition">
                                    Retour
                                </button>
                                <button wire:click="nextStep" 
                                    @if(!$annual_income) disabled @endif
                                    class="w-2/3 bg-green-600 hover:bg-green-500 disabled:opacity-30 disabled:cursor-not-allowed py-4 rounded-xl font-bold transition">
                                    Suivant
                                </button>
        </div>
                </div>

            @elseif($step == 3)
                <h2 class="text-2xl font-bold mb-8">Suivez-vous vos dépenses déductibles ?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model="tracking_status" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none text-white appearance-none">
                            <option value="">-- Sélectionnez une option --</option>
                            <option value="yes">Oui, je tiens des registres précis</option>
                            <option value="sometimes">Parfois, mais pas toujours</option>
                            <option value="no">Non, je ne sais pas quoi suivre</option>
                        </select>
                        @error('tracking_status') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4">
                                <button wire:click="previousStep" class="w-1/3 bg-white/10 hover:bg-white/20 py-4 rounded-xl font-bold transition">
                                    Retour
                                </button>
                                <button wire:click="nextStep" 
                                    @if(!$annual_income) disabled @endif
                                    class="w-2/3 bg-green-600 hover:bg-green-500 disabled:opacity-30 disabled:cursor-not-allowed py-4 rounded-xl font-bold transition">
                                    Suivant
                                </button>
        </div>
                </div>

            @elseif($step == 4)
                <h2 class="text-2xl font-bold mb-6">Dernière étape</h2>
                <div class="space-y-4">
                    <div>
                        <input type="text" wire:model="first_name" placeholder="Prénom" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none text-white">
                        @error('first_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <input type="email" wire:model="email" placeholder="Email" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none text-white">
                        @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <textarea wire:model="tax_concern" placeholder="Votre principale préoccupation fiscale (Optionnel)" class="w-full bg-black/80 border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none h-24 text-white"></textarea>
                    
                    <button wire:click="submit" class="w-full bg-green-600 hover:bg-green-500 py-4 rounded-xl font-bold transition shadow-lg shadow-green-900/20 mt-4">
                        <span wire:loading.remove wire:target="submit">Voir ma recommandation</span>
                        <span wire:loading wire:target="submit">Analyse en cours...</span>
                    </button>
                </div>

            @elseif($step === 'results')
                <div class="text-center">
                    <div class="inline-block p-4 bg-green-500/20 rounded-full text-green-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Analyse Terminée</h2>
                    <p class="text-gray-400 mb-8">{{ $recommendation['message'] }}</p>
                    
                    <div class="bg-green-600/10 border border-green-500/30 rounded-2xl p-6 mb-8">
                        <p class="text-sm uppercase tracking-widest text-green-500 font-bold mb-2">Plan Recommandé</p>
                        <p class="text-2xl font-bold">{{ $recommendation['tier'] }}</p>
                    </div>

                    <a href="/register" class="inline-block w-full text-center bg-green-600 hover:bg-green-500 border-none text-white py-4 rounded-xl text-lg font-bold transition">
                        Commencer mon profil
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
<div class="min-h-screen bg-slate-50 dark:bg-black text-slate-900 dark:text-white flex flex-col items-center justify-center px-6 py-12 transition-colors duration-300">
    
    <div class="max-w-xl w-full">
        @if($step !== 'results')
            <div class="w-full bg-slate-200 dark:bg-white/10 h-2 rounded-full mb-12">
                <div class="bg-green-600 dark:bg-green-500 h-2 rounded-full transition-all duration-500" style="width: {{ ($step / $totalSteps) * 100 }}%"></div>
            </div>
        @endif

        <div class="bg-white dark:bg-white/5 backdrop-blur-xl border border-slate-200 dark:border-green-500/20 rounded-3xl p-8 md:p-12 shadow-2xl">
            
            @if($step == 1)
                <h2 class="text-2xl font-bold mb-8">What is your primary income source?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model.live="income_source" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none text-slate-900 dark:text-white appearance-none">
                            <option value="">-- Select an option --</option>
                            <option value="gig">Gig Economy (Uber, DoorDash, etc.)</option>
                            <option value="freelance">Freelance / Independent</option>
                            <option value="w2">W-2 Employee + Side Hustle</option>
                            <option value="expat">US Expat</option>
                        </select>
                        @error('income_source') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <button wire:click="nextStep" @if(!$income_source) disabled @endif class="w-full bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 py-4 rounded-xl font-bold text-white transition disabled:opacity-30">
                        Next
                    </button>
                </div>

            @elseif($step == 2)
                <h2 class="text-2xl font-bold mb-8">Approximate annual income?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model.live="annual_income" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none text-slate-900 dark:text-white appearance-none">
                            <option value="">-- Select a range --</option>
                            <option value="<30k">Less than $30,000</option>
                            <option value="30k-60k">$30,000 to $60,000</option>
                            <option value="60k-100k">$60,000 to $100,000</option>
                            <option value="100k+">More than $100,000</option>
                        </select>
                        @error('annual_income') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4">
                        <button wire:click="previousStep" class="w-1/3 bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/20 py-4 rounded-xl font-bold transition">
                            Back
                        </button>
                        <button wire:click="nextStep" 
                            @if(!$annual_income) disabled @endif
                            class="w-2/3 bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 text-white disabled:opacity-30 disabled:cursor-not-allowed py-4 rounded-xl font-bold transition">
                            Next
                        </button>
                    </div>
                </div>

            @elseif($step == 3)
                <h2 class="text-2xl font-bold mb-8">Do you track your deductible expenses?</h2>
                <div class="space-y-6">
                    <div>
                        <select wire:model="tracking_status" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none text-slate-900 dark:text-white appearance-none">
                            <option value="">-- Select an option --</option>
                            <option value="yes">Yes, I keep precise records</option>
                            <option value="sometimes">Sometimes, but not always</option>
                            <option value="no">No, I don't know what to track</option>
                        </select>
                        @error('tracking_status') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4">
                        <button wire:click="previousStep" class="w-1/3 bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/20 py-4 rounded-xl font-bold transition">
                            Back
                        </button>
                        <button wire:click="nextStep" 
                            class="w-2/3 bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 text-white py-4 rounded-xl font-bold transition">
                            Next
                        </button>
                    </div>
                </div>

            @elseif($step == 4)
                <h2 class="text-2xl font-bold mb-6">Last step</h2>
                <div class="space-y-4">
                    <div>
                        <input type="text" wire:model="first_name" placeholder="First Name" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none text-slate-900 dark:text-white">
                        @error('first_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <input type="email" wire:model="email" placeholder="Email" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none text-slate-900 dark:text-white">
                        @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <textarea wire:model="tax_concern" placeholder="Your primary tax concern (Optional)" class="w-full bg-white dark:bg-black/80 border border-slate-300 dark:border-white/10 rounded-xl p-4 focus:border-green-600 dark:focus:border-green-500 outline-none h-24 text-slate-900 dark:text-white"></textarea>
                    
                    <button wire:click="submit" class="w-full bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 text-white py-4 rounded-xl font-bold transition shadow-lg shadow-green-900/20 mt-4">
                        <span wire:loading.remove wire:target="submit">View my recommendation</span>
                        <span wire:loading wire:target="submit">Analyzing...</span>
                    </button>
                </div>

            @elseif($step === 'results')
                <div class="text-center">
                    <div class="inline-block p-4 bg-green-500/20 rounded-full text-green-600 dark:text-green-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Analysis Complete</h2>
                    <p class="text-slate-500 dark:text-gray-400 mb-8">{{ $recommendation['message'] }}</p>
                    
                    <div class="bg-green-600/10 border border-green-500/30 rounded-2xl p-6 mb-8">
                        <p class="text-sm uppercase tracking-widest text-green-600 dark:text-green-500 font-bold mb-2">Recommended Plan</p>
                        <p class="text-2xl font-bold">{{ $recommendation['tier'] }}</p>
                    </div>

                    <a href="/register" class="inline-block w-full text-center bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 border-none text-white py-4 rounded-xl text-lg font-bold transition">
                        Start my profile
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
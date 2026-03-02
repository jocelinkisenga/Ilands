<div>
    <div class="max-w-5xl mx-auto px-6 py-12 text-white">

    {{-- PROGRESS --}}
    <div class="mb-10">
        <div class="flex justify-between text-sm text-gray-400 mb-2">
            <span>Step {{ $step }} of {{ $totalSteps }}</span>
            <span>{{ round(($step/$totalSteps)*100) }}%</span>
        </div>
        <div class="w-full bg-white/10 rounded-full h-2">
            <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                 style="width: {{ ($step/$totalSteps)*100 }}%"></div>
        </div>
    </div>

    {{-- =========================
        STEP 1 — INCOME
    ========================== --}}
    @if($step === 1)
        <h2 class="text-2xl font-semibold mb-6">Income Profile</h2>

        <div class="grid md:grid-cols-2 gap-6">

            <input type="number" placeholder="Total W2 Income"
                wire:model="form.income.w2_income"
                class="input">

            <input type="number" placeholder="1099 / Freelance Income"
                wire:model="form.income.freelance_income"
                class="input">

            <input type="number" placeholder="Business Revenue"
                wire:model="form.income.business_revenue"
                class="input">

            <input type="number" placeholder="Business Net Profit"
                wire:model="form.income.business_profit"
                class="input">

            <input type="number" placeholder="Rental Income"
                wire:model="form.income.rental_income"
                class="input">

            <input type="number" placeholder="Dividend Income"
                wire:model="form.income.dividends"
                class="input">

            <input type="number" placeholder="Capital Gains"
                wire:model="form.income.capital_gains"
                class="input">

            <input type="number" placeholder="Crypto Income"
                wire:model="form.income.crypto_income"
                class="input">

            <input type="number" placeholder="Foreign Income"
                wire:model="form.income.foreign_income"
                class="input">

        </div>
    @endif


    {{-- =========================
        STEP 2 — BUSINESS STRUCTURE
    ========================== --}}
    @if($step === 2)
        <h2 class="text-2xl font-semibold mb-6">Business Structure & Operations</h2>

        <div class="grid md:grid-cols-2 space-y-4">

            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.separate_bank"> Separate Business Bank Account</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.separate_credit"> Separate Business Credit Card</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.accounting_software"> Using Accounting Software</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.payroll_system"> Payroll System Active</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.contractors_paid"> Contractors Paid</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.inventory_business"> Inventory Based Business</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.business_vehicle"> Business Vehicle Use</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.accountable_plan"> Accountable Plan in Place</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.home_office_doc"> Home Office Documentation</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.business.monthly_bookkeeping"> Monthly Bookkeeping</label>

        </div>
    @endif


    {{-- =========================
        STEP 3 — DEDUCTIONS
    ========================== --}}
    @if($step === 3)
        <h2 class="text-2xl font-semibold mb-6">Deductible Expenses</h2>

        <div class="grid md:grid-cols-2 gap-6">

            <input type="number" placeholder="Vehicle Mileage"
                wire:model="form.expenses.vehicle_mileage"
                class="input">

            <input type="number" placeholder="Fuel & Repairs"
                wire:model="form.expenses.vehicle_costs"
                class="input">

            <input type="number" placeholder="Home Office Sq Ft"
                wire:model="form.expenses.home_office_sqft"
                class="input">

            <input type="number" placeholder="Utilities"
                wire:model="form.expenses.utilities"
                class="input">

            <input type="number" placeholder="Phone (Business %)"
                wire:model="form.expenses.phone"
                class="input">

            <input type="number" placeholder="Travel"
                wire:model="form.expenses.travel"
                class="input">

            <input type="number" placeholder="Meals"
                wire:model="form.expenses.meals"
                class="input">

            <input type="number" placeholder="Professional Services"
                wire:model="form.expenses.professional_services"
                class="input">

            <input type="number" placeholder="Software Subscriptions"
                wire:model="form.expenses.software"
                class="input">

            <input type="number" placeholder="Equipment"
                wire:model="form.expenses.equipment"
                class="input">

            <input type="number" placeholder="Health Insurance"
                wire:model="form.expenses.health_insurance"
                class="input">

            <input type="number" placeholder="SEP IRA"
                wire:model="form.expenses.sep_ira"
                class="input">

            <input type="number" placeholder="Solo 401k Employee"
                wire:model="form.expenses.solo401k_employee"
                class="input">

            <input type="number" placeholder="Solo 401k Employer"
                wire:model="form.expenses.solo401k_employer"
                class="input">

        </div>
    @endif


    {{-- =========================
        STEP 4 — ASSETS
    ========================== --}}
    @if($step === 4)
        <h2 class="text-2xl font-semibold mb-6">Assets & Liabilities</h2>

        <div class="grid md:grid-cols-2 gap-6">
            <input type="number" placeholder="Primary Residence Value"
                wire:model="form.assets.primary_home_value"
                class="input">

            <input type="number" placeholder="Mortgage Balance"
                wire:model="form.assets.mortgage_balance"
                class="input">

            <input type="number" placeholder="Retirement Account Value"
                wire:model="form.assets.retirement_accounts"
                class="input">

            <input type="number" placeholder="Brokerage Account Value"
                wire:model="form.assets.brokerage_accounts"
                class="input">

            <input type="number" placeholder="Business Valuation"
                wire:model="form.assets.business_value"
                class="input">

            <input type="number" placeholder="Outstanding Business Loans"
                wire:model="form.assets.business_loans"
                class="input">
        </div>
    @endif


    {{-- =========================
        STEP 5 — LIFE EVENTS
    ========================== --}}
    @if($step === 5)
        <h2 class="text-2xl font-semibold mb-6">Life Events</h2>

        <div class="grid md:grid-cols-2 space-y-3">
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.bought_home"> Bought/Sold Home</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.married_divorced"> Married/Divorced</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.had_child"> Had a Child</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.started_business"> Started Business</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.sold_business"> Sold Business</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.moved_state"> Moved State</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.inherited_assets"> Inherited Assets</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.large_medical"> Large Medical Expenses</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.life_events.large_charity"> Large Charitable Donations</label>
        </div>
    @endif


    {{-- =========================
        STEP 6 — RISK & COMPLIANCE
    ========================== --}}
    @if($step === 6)
        <h2 class="text-2xl font-semibold mb-6">Compliance & Risk</h2>

        <div class="grid md:grid-cols-2 space-y-3">
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.irs_notice"> IRS Notice Received</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.prior_audit"> Prior Audit</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.late_filing"> Late Filings</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.foreign_account"> Foreign Bank Accounts</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.crypto_unreported"> Unreported Crypto</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.risk.unfiled_years"> Unfiled Tax Years</label>
        </div>
    @endif


    {{-- =========================
        STEP 7 — GOALS
    ========================== --}}
    @if($step === 7)
        <h2 class="text-2xl font-semibold mb-6">Strategic Goals</h2>

        <div class="grid md:grid-cols-2 space-y-3">
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.reduce_liability"> Reduce Tax Liability</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.optimize_structure"> Optimize Entity Structure</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.audit_defense"> Prepare for Audit</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.retirement_strategy"> Retirement Strategy</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.exit_planning"> Exit Planning</label>
            <label class="block w-full cursor-pointer"><input type="checkbox" wire:model="form.goals.generational_wealth"> Generational Wealth</label>
        </div>
    @endif


    {{-- =========================
        STEP 8 — PERSONAL
    ========================== --}}
    @if($step === 8)
        <h2 class="text-2xl font-semibold mb-6">Personal Information</h2>

        <div class="grid md:grid-cols-2 gap-6">
            <input type="text" placeholder="Full Name"
                wire:model="form.personal.full_name"
                class="input">

            <input type="date"
                wire:model="form.personal.dob"
                class="input">

            <input type="text" placeholder="Filing Status"
                wire:model="form.personal.filing_status"
                class="input">

            <input type="text" placeholder="State of Residence"
                wire:model="form.personal.state"
                class="input">

            <input type="number" placeholder="Number of Dependents"
                wire:model="form.personal.dependents"
                class="input">


        </div>
                            <!-- Location Section -->
                    <div class="divider text-success font-bold">Localisation</div>

                    <div class="grid md:grid-cols-3 gap-6">

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Pays</span>
                            </label>
                                    <select wire:model.live="selectedCountry"
                class="select select-bordered select-success">
                    <option value="">Choisir un pays</option>

                        @foreach($countries as $country)
                            <option value="{{ $country['id'] }}" >
                                {{ $country['name'] }}
                            </option>
                        @endforeach
                     </select>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">État / Province</span>
                            </label>
                                    <select wire:model.live="selectedState"
                class="select select-bordered select-success"
                @disabled(!$states)>
                    <option value="">Choisir une province</option>

                    @foreach($states as $state)
                        <option value="{{ $state['id'] }}">
                            {{ $state['name'] }}
                        </option>
                    @endforeach
        </select>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Ville</span>
                            </label>
                                    <select wire:model.live="selectedCity"
                class="select select-bordered select-success"
                @disabled(!$cities)>
            <option value="">Choisir une ville</option>

                        @foreach($cities as $city)
                            <option value="{{ $city['name'] }}">
                                {{ $city['name'] }}
                            </option>
                        @endforeach
        </select>
                        </div>

                    </div>
    @endif


    {{-- NAVIGATION --}}
    <div class="flex justify-between mt-10">
        @if($step > 1)
            <button wire:click="previousStep"
                class="px-6 py-3 border border-green-500 rounded-lg">
                Previous
            </button>
        @endif

        @if($step < $totalSteps)
            <button wire:click="nextStep"
                class="px-6 py-3 bg-green-600 rounded-lg">
                Next
            </button>
        @else
            <button wire:click="submit"
                class="px-6 py-3 bg-green-600 rounded-lg">
                Generate Report
            </button>
        @endif
    </div>

</div>

{{-- Shared Tailwind Style --}}
<style>
.input {
    @apply w-full bg-white/5 border border-green-500/20 rounded-lg p-3 text-white;
}
</style>
</div>
<x-guest-layout>
@php
   
    $faq = [
        ['q' => 'What is Unstack my taxes?', 'a' => 'It is an education platform for US taxes. You get short, plain-English lessons and an assistant you can ask questions, so you understand what is going on with your return.'],
        ['q' => 'Is this tax advice?', 'a' => 'No. Everything here is educational. For decisions about your own situation, talk to a licensed tax professional such as a CPA or an enrolled agent.'],
        ['q' => 'How does the assistant work?', 'a' => 'You type a question about a tax topic and it explains the concept in simple terms. It can make mistakes, so check anything important on IRS.gov or with a professional.'],
        ['q' => 'Do I need to know anything about taxes to start?', 'a' => 'No. The lessons start from the basics, and you can skip ahead to the topic you care about.'],
        ['q' => 'Who is it for?', 'a' => 'Anyone in the US who files taxes, whether you do it yourself or use a preparer, and wants to understand what the numbers mean.'],
    ];
@endphp
<div x-data="app()" x-init="init()" class="bg-white dark:bg-[#0B0F19] min-h-screen text-slate-900 dark:text-white transition-colors duration-300 font-sans">
<main>
{{-- ============ HERO ============ --}}
<section class="">
    <div class="mx-auto grid max-w-6xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:py-12">
        <div>
            <h1 class="text-4xl font-extrabold leading-[1.1] tracking-tight text-slate-900 dark:text-white  sm:text-5xl">
                Understand your taxes before they surprise you.
            </h1>
            <p class="mt-5 max-w-xl text-lg leading-relaxed text-slate-600 dark:text-slate-400">
                Short, plain-English lessons on how US taxes work, plus an assistant you can ask anything. No jargon, no guessing what a form means.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{route('register')}}" class="inline-flex justify-center rounded-md bg-blue-700 px-6 py-3 text-base font-semibold text-white hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700">Get started</a>
                <button type="button" @click="$dispatch('open-chat')" class="inline-flex justify-center rounded-md border border-blue-200 bg-white px-6 py-3 text-base font-semibold text-blue-800 hover:border-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700">Ask the assistant</button>
            </div>
            <p class="mt-4 text-sm text-slate-500">Educational content, not tax advice.</p>
        </div>

        {{-- Visual : la pile de documents, puis la liste claire --}}
        <div class="flex flex-col items-center gap-8 sm:flex-row sm:justify-center" aria-hidden="true">
            <div class="relative h-44 w-56 shrink-0">
                <div class="absolute left-0 top-10 w-44 -rotate-6 rounded-md border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-500 shadow-sm">Form 1099</div>
                <div class="absolute left-6 top-4 w-44 rotate-3 rounded-md border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-500 shadow-sm">Deductions?</div>
                <div class="absolute left-3 top-[4.5rem] w-44 -rotate-2 rounded-md border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-500 shadow-sm">Credits???</div>
                <div class="absolute left-10 top-0 w-44 rotate-6 rounded-md border border-slate-300 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm">Form W-2</div>
            </div>
            <svg class="h-8 w-8 shrink-0 rotate-90 text-blue-700 sm:rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"/></svg>
            <ul class="w-60 shrink-0 divide-y divide-slate-100 rounded-lg border border-blue-100 bg-white shadow-md">
                @foreach (['Income: what counts', 'Deductions: what lowers it', 'Credits: what reduces the bill', 'Filing: what to send, when'] as $row)
                    <li class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-800">
                        <svg class="h-5 w-5 shrink-0 text-blue-700" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0L3.3 9.7a1 1 0 1 1 1.4-1.4l3.8 3.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                        {{ $row }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- ============ RÉASSURANCE (uniquement des faits vrais) ============ --}}
<section class="border-y border-slate-200 bg-white dark:bg-[#0B0F19] ">
    <ul class="mx-auto grid max-w-6xl gap-x-8 gap-y-4 px-4 py-6 text-sm font-medium text-slate-700 dark:text-white sm:grid-cols-2 sm:px-6 lg:grid-cols-4">
        <li>Plain English, no jargon</li>
        <li>Learn at your own pace</li>
        <li>Ask the assistant any time</li>
        <li>Educational, not tax advice</li>
    </ul>
</section>

{{-- ============ LE PROBLÈME ============ --}}
<section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:py-24">
    <h2 class="text-3xl font-bold tracking-tight text-black dark:text-blue-600 sm:text-4xl">Taxes feel stacked up because nobody explains how the pieces fit.</h2>
    <p class="mt-5 text-lg leading-relaxed text-slate-600 dark:text-slate-400">
        Income forms, deductions, credits, deadlines. Each one makes sense on its own. Together they turn into a pile, and most people deal with it once a year, in a hurry.
    </p>
    <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-400">
        Unstack my taxes takes the pile apart one topic at a time, so you know what each piece does and why it matters to you.
    </p>
</section>

{{-- ============ SECTIONS PRODUIT EN ALTERNANCE ============ --}}
<section id="topics" class="bg-slate-50 dark:bg-[#0B0F19]">
    <div class="mx-auto max-w-6xl space-y-20 px-4 py-16 sm:px-6 lg:space-y-28 lg:py-24">

        {{-- Apprendre --}}
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-blue-600 sm:text-3xl">Learn the basics in short lessons.</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-400">Each lesson covers one idea, from filing status to the difference between W-2 and 1099 income. Read it in a few minutes, then move on when you're ready.</p>
                <a href="{{route('register')}}" class="mt-6 inline-block font-semibold text-blue-700 underline underline-offset-4 hover:text-blue-900">Start with the basics</a>
            </div>
            {{-- Remplace ce bloc par une capture de ton app : <img src="{{ asset('images/lessons.png') }}" alt="..."> --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm" aria-hidden="true">
                @foreach ([['Filing status, explained', 'w-full'], ['W-2 vs. 1099 income', 'w-2/3'], ['Standard vs. itemized deduction', 'w-1/4']] as [$title, $w])
                    <div class="@if(!$loop->first) mt-5 @endif">
                        <div class="flex justify-between text-sm font-semibold text-slate-800"><span>{{ $title }}</span></div>
                        <div class="mt-2 h-2 rounded-full bg-slate-100"><div class="h-2 rounded-full bg-blue-700 {{ $w }}"></div></div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Demander --}}
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div class="lg:order-last">
                <h2 class="text-2xl font-bold tracking-tight text-blue-600 sm:text-3xl">Ask a question, get a clear answer.</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-400">Stuck on a term? Ask the assistant. It explains the concept in simple words and points you to the lesson that goes deeper.</p>
                <button type="button" @click="$dispatch('open-chat')" class="mt-6 font-semibold text-blue-700 underline underline-offset-4 hover:text-blue-900">Try the assistant</button>
            </div>
            <div class="space-y-3 rounded-xl border border-slate-200 bg-white p-5 shadow-sm" aria-hidden="true">
                <p class="ml-auto max-w-[85%] rounded-2xl rounded-br-sm bg-blue-700 px-4 py-2.5 text-sm text-white">What's the difference between a deduction and a credit?</p>
                <p class="max-w-[90%] rounded-2xl rounded-bl-sm bg-slate-100 px-4 py-2.5 text-sm text-slate-800 dark:text-slate-400">A deduction lowers the income you're taxed on. A credit lowers the tax you owe, dollar for dollar.</p>
            </div>
        </div>

        {{-- Suivre --}}
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-blue-600 sm:text-3xl">See where you are and what's next.</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-400">Your dashboard keeps your progress in one place, so you can pick up where you left off instead of starting over every season.</p>
                <a href="{{route('dashboard')}}" class="mt-6 inline-block font-semibold text-blue-700 underline underline-offset-4 hover:text-blue-900">Open your dashboard</a>
            </div>
            {{-- Idéal : une vraie capture du dashboard ILANDS ici --}}
            <div class="grid grid-cols-3 gap-3 rounded-xl border border-slate-200 bg-white p-5 shadow-sm" aria-hidden="true">
                @foreach (['Income', 'Deductions', 'Credits'] as $t)
                    <div class="rounded-lg bg-blue-50 p-3">
                        <p class="text-xs font-semibold text-blue-900">{{ $t }}</p>
                        <div class="mt-3 h-1.5 rounded-full bg-blue-100"><div class="h-1.5 rounded-full bg-blue-700" style="width: {{ [70, 40, 15][$loop->index] }}%"></div></div>
                    </div>
                @endforeach
                <div class="col-span-3 rounded-lg border border-dashed border-slate-300 p-3 text-sm text-slate-500">Next lesson: Standard vs. itemized deduction</div>
            </div>
        </div>
    </div>
</section>

{{-- ============ HOW IT WORKS (vraie séquence : numérotation justifiée) ============ --}}
<section id="how-it-works" class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:py-24 dark:bg-[#0B0F19]">
    <h2 class="text-3xl font-bold tracking-tight text-blue-600 sm:text-4xl">How it works</h2>
    <ol class="mt-10 grid gap-8 md:grid-cols-3">
        @foreach ([
            ['Create your account', 'It takes a minute. Nothing to upload to get started.'],
            ['Pick a topic', 'Start at the beginning or jump to what you need right now.'],
            ['Learn, then ask', 'Read the lesson. If something is unclear, ask the assistant.'],
        ] as [$title, $text])
            <li class="flex gap-4">
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-700 text-base font-bold text-white">{{ $loop->iteration }}</span>
                <div>
                    <h3 class="text-lg font-semibold text-blue-600">{{ $title }}</h3>
                    <p class="mt-1 text-slate-600 dark:text-slate-400">{{ $text }}</p>
                </div>
            </li>
        @endforeach
    </ol>
</section>

{{-- ============ FAQ ============ --}}
<section id="faq" class="bg-slate-50 dark:bg-[#0B0F19]">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:py-24" x-data="{ active: null }">
        <h2 class="text-3xl font-bold tracking-tight text-blue-600 sm:text-4xl">Common questions</h2>
        <div class="mt-8 divide-y divide-slate-200 border-y border-slate-200">
            @foreach ($faq as $i => $item)
                <div>
                    <button type="button" @click="active = active === {{ $i }} ? null : {{ $i }}" :aria-expanded="active === {{ $i }}" class="flex w-full items-center justify-between gap-4 py-5 text-left text-lg font-semibold dark:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-blue-700">
                        {{ $item['q'] }}
                        <svg class="h-5 w-5 shrink-0 text-blue-700 transition-transform" :class="active === {{ $i }} && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div x-show="active === {{ $i }}" x-cloak x-collapse>
                        <p class="pb-5 leading-relaxed text-translate-950 dark:text-slate-200">{{ $item['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ CTA FINAL ============ --}}
<section class="bg-blue-800">
    <div class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Start with one topic. See how it feels.</h2>
        <p class="mx-auto mt-4 max-w-xl text-lg text-blue-100">You don't need to understand all of it today. You just need to begin.</p>
        <a href="{{route('register')}}" class="mt-8 inline-block rounded-md bg-white px-6 py-3 text-base font-semibold text-blue-900 hover:bg-blue-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
    </div>
</section>
</main>



</div>
</x-guest-layout>
<div>
    <section>
        <div class="max-w-[60%] mx-auto my-12">
            @foreach ($sectionQuestions as $indexSection => $sectionQuestion)
                <div id="sectionQuestion{{ $indexSection }}" class="{{ (!$loop->first)? 'mt-8' : ''}}">
                    <h1 class="text-2xl font-extrabold uppercase text-transparent bg-clip-text bg-gradient-to-b from-theme-orange to-theme-yellow mb-4">{{ $sectionQuestion->name }}</h1>
                    <div class="flex space-x-12">
                            @foreach ($sectionQuestion->frequentQuestions->chunk(round($sectionQuestion->frequentQuestions->count()/2)) as $chunk)
                            <div class="w-1/2">
                                @foreach ($chunk as $indexFrequentQuestion => $frequentQuestion)
                                    <div class="bg-theme-lwgray rounded-md p-4 mb-4">
                                        <div class="px-3 border-l-2 border-theme-yellow" x-data="{ open: false }">
                                            <h3 class="bg-white rounded-md">
                                                <button type="button"
                                                    class="group relative w-full flex justify-between items-center text-left px-4 py-3"
                                                    aria-controls="frequent-question-{{ $indexFrequentQuestion }}" @click="open = !open" x-bind:aria-expanded="open">
                                                    <span class="text-black text-sm font-bold">
                                                        {{ $frequentQuestion->name }}
                                                    </span>
                                                    <span class="ml-6 flex items-center">
                                                        <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                            style="display: none;">
                                                            <path class="fill-theme-yellow" fill-rule="evenodd"
                                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path class="fill-theme-yellow" fill-rule="evenodd"
                                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                            </h3>
                                            <div class="text-sm text-justify pt-3" id="frequent-question-{{ $indexFrequentQuestion }}" x-show="open">
                                                {{ $frequentQuestion->description }}
                                            </div>
                                        </div> 
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

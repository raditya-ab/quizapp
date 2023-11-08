<div class="bg-white rounded-lg shadow-lg mx-auto relative md:h-[calc(100vh-(6rem*2)-1rem)] h-screen w-[95%] sm:w-3/4">
    <!-- Start of quiz box -->
    @if($quizInProgress)
    <div class="px-6 py-10 sm:px-14 bg-gray-100">
        <div class="flex flex-col justify-center sm:grid sm:grid-cols-3 max-w-auto bg-slate-300">
            <div class="flex justify-center mb-10 sm:justify-start">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-[135px] h-[158px]">
            </div>
            <div class="justify-center text-center relative">
                <h2 class="font-bold text-lg sm:text-4xl text-center">{{$currentQuestion->question}}</h2>
                @if($learningMode)
                <div x-data={show:false} class="block text-xs">
                    <div class="p-1" id="headingOne">
                        <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none text-xs px-3" type="button">
                            Explanation
                        </button>
                    </div>
                    <div x-show="show" class="block p-2 italic text-slate-400 text-xl">
                        {{$currentQuestion->explanation}}
                    </div>
                </div>
                @endif
                <div id="countdown" class="mt-10 mb-10 sm:mb-5 text-4xl flex justify-center">
                    <div>
                        <svg class="w-[20px] h-[20px] sm:w-[50px] sm:h-[50px]" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M40.4458 18.5459C40.6718 18.4479 40.8786 18.3103 41.0562 18.1397L42.0979 17.098C42.2913 16.9046 42.4448 16.6749 42.5494 16.4222C42.6541 16.1695 42.708 15.8986 42.708 15.6251C42.708 15.3515 42.6541 15.0807 42.5494 14.8279C42.4448 14.5752 42.2913 14.3456 42.0979 14.1522C41.9045 13.9587 41.6748 13.8053 41.4221 13.7006C41.1694 13.5959 40.8985 13.5421 40.625 13.5421C40.3514 13.5421 40.0806 13.5959 39.8278 13.7006C39.5751 13.8053 39.3455 13.9587 39.1521 14.1522L38.1104 15.1938L37.8708 15.5542C34.9121 12.7454 31.1154 10.982 27.0604 10.5334L27.0833 10.4167V8.33341H29.1666C30.3125 8.33341 31.25 7.39591 31.25 6.25008C31.25 5.10425 30.3125 4.16675 29.1666 4.16675H20.8333C19.6875 4.16675 18.75 5.10425 18.75 6.25008C18.75 7.39591 19.6875 8.33341 20.8333 8.33341H22.9166V10.4167L22.9416 10.5355C18.1859 11.0732 13.8158 13.4091 10.7266 17.0647C7.63749 20.7203 6.06322 25.4189 6.32636 30.1977C6.58949 34.9765 8.67011 39.4738 12.1419 42.7681C15.6138 46.0625 20.2139 47.9045 25 47.9167C28.4158 47.9156 31.7664 46.9815 34.69 45.2151C37.6136 43.4487 39.9992 40.9172 41.5891 37.894C43.1789 34.8707 43.9128 31.4706 43.7113 28.0608C43.5098 24.6509 42.3807 21.3609 40.4458 18.5459ZM25 43.7501C16.9604 43.7501 10.4166 37.2084 10.4166 29.1667C10.4166 21.1251 16.9604 14.5834 25 14.5834C33.0396 14.5834 39.5833 21.1251 39.5833 29.1667C39.5833 37.2084 33.0396 43.7501 25 43.7501ZM27.0833 27.0834V22.9167C27.0833 21.7709 26.1458 20.8334 25 20.8334C23.8541 20.8334 22.9166 21.7709 22.9166 22.9167V29.1667C22.9166 30.3126 23.8541 31.2501 25 31.2501H31.25C32.3958 31.2501 33.3333 30.3126 33.3333 29.1667C33.3333 28.0209 32.3958 27.0834 31.25 27.0834H27.0833ZM25 16.6667C18.1 16.6667 12.5 22.2667 12.5 29.1667C12.5 36.0667 18.1 41.6667 25 41.6667C31.9 41.6667 37.5 36.0667 37.5 29.1667C37.5 22.2667 31.9 16.6667 25 16.6667ZM25 39.5834C19.2562 39.5834 14.5833 34.9105 14.5833 29.1667C14.5833 23.423 19.2562 18.7501 25 18.7501C30.7437 18.7501 35.4166 23.423 35.4166 29.1667C35.4166 34.9105 30.7437 39.5834 25 39.5834Z" fill="#012A48" />
                        </svg>
                    </div>
                    <div class="flex items-end sm:text-4xl text-lg font-bold">
                        <span class="font-bold" id="countdown-minute">10</span>:<span class="font-bold" id="countdown-second">10</span>
                    </div>
                </div>
                <p class="max-w-2xl text-base sm:text-xl font-semibold text-white bg-red-pdi px-5 py-1 rounded-lg absolute left-1/2 translate-x-[-50%] -bottom-[65px] sm:-bottom-[56px]">
                    Pertanyaan ke-{{$count}} dari {{$quizSize}}
                </p>
            </div>
            <div class="hidden sm:block sm:relative">
                <img src="{{ asset('images/kpu-mascot.png') }}" alt="logo" class="w-[325px] md:absolute md:-top-36 md:left-1/2 md:translate-x-[-50%]">
            </div>
        </div>
    </div>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-6">
        <form wire:submit.prevent>
            <div class="px-6 py-5 md:px-14 md:grid md:grid-cols-2 md:gap-5">
                @foreach($currentQuestion->answers as $answer)
                <label for="question-{{$answer->id}}">
                    <div class="max-w-auto p-5 m-3 text-gray-800 rounded-lg border-2 border-gray-300 text-base font-extrabold ">
                        <span class="mr-2 font-extrabold">
                            <input id="question-{{$answer->id}}" value="{{$answer->id .','.$answer->is_checked}}" wire:model="userAnswered" type="radio">
                        </span> {{$answer->answer}}
                    </div>
                </label>
                @endforeach
            </div>
            <div class="flex items-center justify-end mt-4">
                @if($count < $quizSize) <button wire:click="nextQuestion" type="submit" @if($isDisabled) disabled='disabled' @endif class="m-4 inline-flex items-center px-8 py-2 bg-red-pdi border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-red-chili active:bg-red-pdi focus:outline-none focus:border-red-pdi focus:ring focus:ring-red-chili disabled:opacity-25 transition">
                    {{ __('Selanjutnya') }}
                    </button>
                    @else
                    <button wire:click="nextQuestion" type="submit" @if($isDisabled) disabled='disabled' @endif class="m-4 inline-flex items-center px-8 py-2 bg-red-pdi border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-red-chili active:bg-red-pdi focus:outline-none focus:border-red-pdi focus:ring focus:ring-red-chili disabled:opacity-25 transition">
                        {{ __('Selesai') }}
                    </button>
                    @endif
            </div>
        </form>
    </div>
    @endif
    <!-- end of quiz box -->

    @if($showResult)
    <section class="text-gray-600 body-font">
        <div class="bg-white border-2 border-gray-300 shadow overflow-hidden sm:rounded-lg">
            <div class="container px-5 py-5 mx-auto">
                <div class="text-center mb-5 justify-center">
                    <h1 class=" sm:text-3xl text-2xl font-bold text-center title-font text-gray-900 mb-4 uppercase">Hasil Quiz</h1>
                    <h2 class="sm:text-3xl text-2xl font-bold text-center title-font text-gray-900 mb-4 uppercase">Terima kasih telah mengikuti Quiz kami</h2>
                    <p class="font-bold sm:text-2xl text-xl text-center">{{$quizPecentage}}%</p>
                    <!-- <p class="text-md mt-10"> Dear <span class="font-extrabold text-blue-600 mr-2"> {{Auth::user()->name.'!'}} </span> You have secured <a class="bg-green-300 px-2 mx-2 hover:green-400 rounded-lg underline" href="{{route('userQuizDetails',$quizid) }}">Show quiz details</a></p> -->
                    <progress class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto" id="quiz-{{$quizid}}" value="{{$quizPecentage}}" max="100"> {{$quizPecentage}} </progress>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center justify-center flex-col font-bold">
                            <p class="block title-font font-bold mr-5 text-red-pdi uppercase">Jawaban Benar</p><p class="title-font font-bold">{{$currectQuizAnswers}}</p>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center justify-center flex-col font-bold">
                            <p class="block title-font font-bold mr-5 text-red-pdi uppercase">Total Jawaban</p><p class="title-font font-bold">{{$totalQuizQuestions}}</p>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center justify-center flex-col font-bold">
                            <p class="block title-font font-bold mr-5 text-red-pdi uppercase">Total Waktu</p><p class="title-font font-bold">{{ $quizPecentage > 70 ? 'Pass' : 'Fail' }}</p>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center justify-center flex-col font-bold">
                            <p class="block title-font font-bold mr-5 text-red-pdi uppercase">Persentase Jawaban</p><p class="title-font font-bold">{{$quizPecentage.'%'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($setupQuiz)
    <section class="text-gray-600 mx-auto body-font h-full">
        <div class="container px-5 py-2 mx-auto h-full">
            <div class="flex flex-wrap h-full">
                <div class="p-4 sm:w-1/2 w-full sm:flex-1 mx-auto">
                    <form wire:submit.prevent="startQuiz">
                        @csrf
                        <h2 class="text-gray-900 text-4xl font-extrabold title-font mb-10 uppercase text-center">Ikuti Quiz</h2>
                        <div class="relative mx-full mb-4">
                            <select name="section" id="section_id" wire:model="sectionId" class="block w-full mt-1 rounded-md bg-gray-100 border-2 border-gray-500 focus:bg-white focus:ring-0">
                                @if($sections->isEmpty())
                                <option value="">No Quiz Sections Available Yet</option>
                                @else
                                <option value="">Select a Quiz Section</option>
                                @foreach($sections as $section)
                                @if($section->questions_count>0)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                                @endif
                                @endforeach
                                @endif
                            </select>
                            @error('sectionId') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="hidden items-start">
                            <div class="flex items-center h-5">
                                <input wire:model="learningMode" id="learningMode" name="learningMode" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="learningMode" class="font-medium text-gray-700">Learning Mode?</label>
                                <p class="text-gray-500">If checked, this will enable explanation tab for each question.</p>
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <select name="quiz_size" id="quiz_size" wire:model="quizSize" class="max-w-full block w-full mt-1 rounded-md bg-gray-100 border-2 border-gray-500 focus:bg-white focus:ring-0">
                                @for ($i = 1; $i <= 50; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor
                            </select>
                            @error('quizSize') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="block w-full text-white bg-red-chili border-0 py-2 px-8 focus:outline-none hover:bg-red-chili rounded text-lg">Start Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
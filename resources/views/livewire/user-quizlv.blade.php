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
                            <p class="block title-font font-bold mr-5 text-red-pdi uppercase">Total Waktu</p><p class="title-font font-bold">{{ date("i:s", $time_taken) }}</p>
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
                        <h1 class="text-gray-900 text-4xl font-extrabold title-font mb-10 uppercase text-center">Ikuti Quiz</h1>
                        <h2 class="text-center text-3xl">Selamat datang, <br /><span class="font-black">{{auth()->user()->name}}</span></h2>
                        <p class="mt-72 mb-5 text-center">Silahkan tekan tombol dibawah untuk memulai quiz</p>
                        <input type="hidden" wire:model="sectionId" name="section" value="{{2}}">
                        <input type="hidden" wire:model="quizSize" name="quiz_size" value="{{10}}">

                        <button type="submit" class="block w-full text-white bg-red-chili border-0 py-2 px-8 focus:outline-none hover:bg-red-chili rounded text-lg">Mulai Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
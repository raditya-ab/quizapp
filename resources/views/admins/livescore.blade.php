<x-app-layout>
  <div class="w-screen h-screen bg-[#210808] opacity-[60%] absolute">
  </div>
  <div class="flex flex-col justify-center relative">
    <div class="ml-12 mt-10 h-full">
      <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-[160px]">
    </div>
    <div class="mt-3">
      <div class="title font-black text-4xl text-white">
        <h1 class="text-center uppercase">Quiz Live Score</h1>
      </div>
      <div class="mt-10">
        <div class="grid grid-cols-4 mx-2">
          <div class="text-center uppercase font-extrabold text-2xl text-white">Nama</div>
          <div class="text-center uppercase font-extrabold text-2xl text-white">Jawaban Benar</div>
          <div class="text-center uppercase font-extrabold text-2xl text-white">Total Waktu</div>
          <div class="text-center uppercase font-extrabold text-2xl text-white">Nilai</div>
        </div>
        @foreach ($data as $i => $datum)
        @php
        if ($i < 3) { $iter=$i+1; }else { $iter=null; }
          @endphp
          <div class="grid grid-cols-4 mx-2 rounded-2xl bg-gray-300 my-5 py-5 px-5">
            <div class="text-center uppercase text-2xl font-bold flex justify-center items-center">
              @if ($iter)
              <span class="py-2 px-4 rounded-full bg-red-pdi mr-3">
                {{ $iter }}
              </span>
              @endif
              {{ $datum['name'] }}
            </div>
            <div class="text-center uppercase text-2xl font-bold flex justify-center items-center">{{ $datum['correct_answers'] }}</div>
            <div class="text-center uppercase text-2xl font-bold flex justify-center items-center">{{ date("i:s", $datum['total_time']) }}</div>
            <div class="text-center uppercase text-lg font-bold flex justify-start items-center w-full">
              <div class="basis-3/4 w-3/4 mr-3">
                <progress class="text-base leading-relaxed mr-2 w-full" id="quiz-{{$i}}" value="{{ $datum['realtime_score'] }}" max="100"> {{ $datum['realtime_score'] }} </progress>
              </div>
              <div class="w-1/4 basis-1/4">{{ $datum['realtime_score'] }}%</div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
    <div class="mt-14 flex justify-center">
    <img src="{{ asset('images/kpu-mascot.png') }}" alt="logo" class="h-[197px]">
    </div>
  </div>
</x-app-layout>
<script>
  setInterval(function() {
    location.reload();
  }, 5000);
</script>
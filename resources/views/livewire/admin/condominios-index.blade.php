<div class="">
    <h1 class="text-xl italic font-bold text-center text-gray-500 my-2">Seleccione el condominio que desea administrar</h1>
   <div class="container mx-auto bg-white rounded my-4 flex flex-wrap">

       @foreach ($condominios as $condominio)

      <section class="w-1/3 h-screen flex justify-center items-center px-2">
         <div
            class="wrapper max-w-sm bg-gray-50 rounded-b-md shadow-lg overflow-hidden"
         >
            <div>
                     @if($condominio->logo)
                            <img src="{{asset('storage/'.$condominio->logo)}}" class="h-20 w-20 mx-auto my-2"
                                alt="{{$condominio->name}}">
                                @else
                            <img src="{{asset('assets/logo/9.png')}}" class="h-20 w-20 mx-auto my-2"
                                alt="rokave">
                                @endif
            </div>
            <div class="p-3 space-y-3">
               <h3 class="text-gray-700 font-semibold text-md">
                {{$condominio->name}}
               </h3>
               <p class="text-sm text-gray-900 leading-sm">
                   <small>
                  apartamentos :{{$condominio->apartments()->count()}} <hr>
                  dirección: {{$condominio->address}}<hr>
                  Teléfono :{{$condominio->phone}} <hr>
                  Movil: {{$condominio->mobil}}<hr>
                  email: {{$condominio->email}}<hr></small>
               </p>
                @if($condominio->socials)
                @endif
               <p>
                  <span class="flex">
                     <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        class="h-5 text-teal-600"
                     >
                        <path
                           d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                     </svg>
                     <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        class="h-5 text-teal-600"
                     >
                        <path
                           d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                     </svg>
                     <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        class="h-5 text-teal-600"
                     >
                        <path
                           d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                     </svg>
                     <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        class="h-5 text-teal-600"
                     >
                        <path
                           d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                     </svg>
                     <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        class="h-5 text-gray-200"
                     >
                        <path
                           d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                     </svg>
                  </span>
               </p>
            </div>
            <a
               class="bg-teal-600 w-2/3 flex justify-center mx-auto py-2 text-gray-600 font-semibold transition duration-300 hover:bg-teal-500 p-4 my-3"
               role="button"
              href="{{url('/gestion')}}"
            >
               <svg
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  class="h-6 mr-1 text-gray-500"
               >
                  <path
                     d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                     clip-rule="evenodd"
                     fill-rule="evenodd"
                  ></path>
                  <path
                     d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"
                  ></path></svg
               >administrar
            </a>
         </div>
      </section>
       @endforeach
   </div>
</div>

@extends('layouts.simple')
@section('main')
<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <span class="font-bold text-xl">Biznet</span>
  </div>

  <div class="w-full block flex-grow sm:flex sm:items-center sm:w-auto">
    <div class="text-sm sm:flex-grow">
      <a
        href="#"
        class="block mt-4 sm:inline-block sm:mt-0 text-teal-200 hover:text-white mr-4"
      >
        Your Business
      </a>
      <a
        href="#"
        class="block mt-4 sm:inline-block sm:mt-0 text-teal-200 hover:text-white mr-4"
      >
        Networking
      </a>
      <a
        href="#"
        class="block mt-4 sm:inline-block sm:mt-0 text-teal-200 hover:text-white"
      >
        Blog
      </a>
    </div>
    <div>
      <a
        href="#"
        class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-500 hover:bg-white mt-4 md:mt-0"
        >Login</a
      >
    </div>
  </div>
</nav>
@section('content-simp')
  <h1 class="text-blurple">Hello World</h1>
      <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
        Find Friends
      </button>
      <button class="ext-sample ext-sample-red">
        Find Groups
      </button>
      <div class="bg-red-100 border border-red-400 tex-red-700 px-4 py-3 rounded relative my-5" role="alert">
        <strong class="font-bold">
          Alert!
          <span class="block sm:inline ">Please update kjasdkl;fjalskdjfla;skd</span>
        </strong>
      </div>
      <div class="max-w-sm mx-auto flex p-6 bg-white rounded-lg shadow-xl">
      <div class="flex-shrink-0">
          <img class="h-12 w-12" src="<?php echo get_home_url() . '/app/uploads/2020/05/8358e868-4a30-31ab-abbc-2cb9df5abdf0.jpg' ?>" />
      </div>
      <div class="ml-6 pt-1">
        <h4 class="text-xl text-gray-900">
          Something Here
        </h4>
        <p class="text-base text-gray-600">You've got mail bro</p>
      </div>
    </div>
    
        <!-- CARD COLUMNS -->
        <div class="container mt-5 mx-auto px-2">
          <!-- Flex on med screens and up -->
          <div class="md:flex">
            <div
              class="flex-1 text-gray-700 text-center bg-gray-400 px-5 py-5 m-2 rounded"
            >
              <div class="lg:flex lg:items-center">
                <div class="lg:flex-shrink-0">
                  <img class="rounded-lg lg:w-64" src="https://i.ibb.co/mJJNkTJ/img2.jpg" alt="" />
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-6">
                  <div
                    class="uppercase tracking-wide text-sm text-indigo-600 font-bold"
                  >
                    Networking
                  </div>
                  <a
                    href="#"
                    class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline"
                    >Finding connections to help your business grow</a
                  >
                </div>
              </div>
            </div>
            <div
              class="flex-1 text-gray-700 text-center bg-gray-400 px-5 py-5 m-2 rounded"
            >
              <div class="lg:flex lg:items-center">
                <div class="lg:flex-shrink-0">
                  <img class="rounded-lg lg:w-64" src="https://i.ibb.co/w4wGYvQ/img1.jpg
    " alt="" />
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-6">
                  <div
                    class="uppercase tracking-wide text-sm text-indigo-600 font-bold"
                  >
                    Marketing
                  </div>
                  <a
                    href="#"
                    class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline"
                    >Finding customers for your new business</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@extends('layouts.simple')
@section('main')

@section('main')
  <section class="intro bg-sk-red-700 text-white flex h-screen items-center font-display">
    <div class="container flex-auto text-center ">
      <h1 class="font-black text-5xl tracking-wider">Hello</h1>
      <p class="font-light text-3xl tracking-wider"><strong class="font-black">I'm</strong> a pixel pushing<br /> creative <strong class="font-black">Web Developer</strong></p>
      <button class="bg-white bg-opacity-15 border-solid border border-white-100 py-2 px-4 my-10 w-40">
        View My Work
      </button>
    </div>
  </section>
  <section class="about flex h-screen items-center font-display py-6">
    <div class="container flex-auto text-left">
      <div class="text-content">
        <h2 class="font-bold text-4xl leading-tight mb-3">Hello, I’m Alex.<br />
        I do web things</h2>
        <h3 class="font-display2 font-regular text-lg leading-relaxed mb-3">I am a front-end/Wordpress
        developer and designer</h3>
        <p>Amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        <p>Ipsum dolor sit amet, consectetur <a href="#">adipiscing elit.</a></p>
      </div>
      <div class="w-full progress font-display2 text-left">
        <div class="shadow w-full bg-sk-grey">
         <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 45%">JavaScript</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 55%">VUE</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">PHP</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">HTML5</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">CSS/Sass</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">UI/UX</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">Web Design</div>
        </div>
        <div class="shadow w-full bg-sk-grey mt-4">
          <div class="bg-sk-red-500 leading-none py-1 pl-2 text-white" style="width: 65%">Email Dev</div>
        </div>
      </div>
    </div>
  </section>
  <section class="projects box-border overflow-y-hidden border-solid border border-sk-grey-dark flex flex-col h-screen font-display text-center pt-3 pb-16">
    <div class="container flex-none py-4"><h2 class="font-bold text-4xl leading-tight mb-3">Projects</h2></div>
    <div class="container flex-grow overflow-y-scroll">
      <div class="grid grid-rows-3 grid-flow-col gap-0">
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
      </div>
      <div class="grid grid-rows-3 grid-flow-col gap-0">
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
          <div class="row-span-1 lg:row-span-3 bg-sk-grey border-solid border-2 border-white py-10">img 1</div>
      </div>
    </div>
    <div class="container flex-none py-3">
      <nav class="flex items-center items-stretch text-center">
          <a href="#" class="flex-1">Design</a>
          <a href="#" class="flex-1">Development</a>
          <a href="#" class="flex-1 active">All</a>
      </nav>
    </div>
  </section>
  <section class="dms overflow-y-hidden border-solid border border-sk-grey-dark flex h-screen font-body text-center py-6">
    <div class="container flex-grow font-body">
      <h2 class="font-display text-5xl font-black">Slide in the DM's</h2>
      <h3 class="font-display2 text-sk-grey-dark text-lg leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed?</h3>
      
        <div class="w-full">
          <form class="pt-6 pb-6 mb-4">
            <div  class="mb-4">
              <input class="border border-sk-grey w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
            </div>
            <div class="mb-6">
              <input class="border border-sk-grey w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
            </div>
            <div class="mb-6">
              <textarea class="border border-sk-grey w-full py-2 px-3 bg-white text-black leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Your Message" rows="8"></textarea>
            </div>
            <div class="flex items-center justify-between">
              <button class="w-full rounded bg-sk-red-500 text-white font-regular text-2xl py-2" type="button">
                Submit
              </button>
            </div>
          </form>
        </div>

        <nav class="social w-4/5 mx-auto bg-white flex items-center items-stretch text-center py-3">  
          <a
            href="#"
            class="flex-1"
            >
            <img class="w-12 h-auto inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/behance.svg'?>" />
          </a>
          <a
            href="#"
            class="flex-1"
            >
            <img class="w-12 h-auto inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/linkedin.svg'?>" />
          </a>
          <a
            href="#"
            class="flex-1"
            >
            <img class="w-12 h-auto  inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/instagram.svg'?>" />
          </a> 
        </nav>
        <p class="text-center text-xs font-normal my-2">© Manuel Soto 2020</p>
    </div>
    
  </section>
  <nav class="small-nav bg-white border-solid border-t border-sk-grey-dark flex items-center items-stretch text-center py-4">  
      <a
        href="#"
        class="flex-1"
        >
        <img class="w-5 h-auto inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/squaresIcon.svg'?>" />
      </a>
      <a
        href="#"
        class="flex-1"
        >
        <img class="w-6 h-auto inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/dude1Icon.svg'?>" />
      </a>
      <a
        href="#"
        class="flex-1"
        >
        <img class="w-6 h-auto  inline-block" src="<?php echo get_template_directory_uri() . '/resources/assets/images/chatBubbleIcon.svg'?>" />
      </a> 
</nav>

@endsection

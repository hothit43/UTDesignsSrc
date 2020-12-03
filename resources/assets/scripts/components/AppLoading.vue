<template>

  <div class="container flex flex-grow overflow-hidden font-display text-center z-10 fixed max-w-none" id="page-loading">
      <div class="proj-loading w-full h-full absolute left-0 top-0">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
        </div>
  </div>
</template>

<style scoped>
    #page-loading {
        height:100vh;
        width: 100vw;
        background-color: #800606;
    }
</style>
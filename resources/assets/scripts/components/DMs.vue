<template>
  <section class="section dms flex h-screen font-body text-center xs:pt-10 pt-2 lg:pb-0 xs:pb-6 pb-4 lg:py-0 lg:bg-sk-grey">
    <div class="container lg:p-0 lg:max-w-full lg:flex lg:flex-wrap items-center font-body">
      <div class="content pt-4 w-full">
        <h2 class="font-display text-4xl xs:text-5xl font-black">Slide in the DM's</h2>
        <h3 class="font-display2 text-sk-grey-dark xs:text-lg text-xs leading-relaxed">Have a question or need my expertise? You know what to do!</h3>
        
          <div class="relative w-full max-w-3xl mx-auto">
            <div class="form-alert success absolute z-10 bg-sk-grey w-full top-0 text-left border-t-4 rounded-b text-sk-grey-dark px-4 py-3 shadow-md my-2" role="alert"
            :class="[{'simp-fade' : !messageSent}]">
              <div class="flex">
                <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#35bc4d" id="check" class="alert-check" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10c5.5,0,10-4.5,10-10S15.5,0,10,0z M10,18c-4.4,0-8-3.6-8-8
	s3.6-8,8-8c4.4,0,8,3.6,8,8S14.4,18,10,18z M8,12.2l6.6-6.6L16,7l-8,8l-4-4l1.4-1.4L8,12.2z"/>
                </svg>
                <div>
                  <p class="font-bold">Success</p>
                  <p class="text-sm">Thanks for sliding in those DMs, we'll review and get back to you!</p>
                </div>
              </div>
            </div>
            <form class="xs:pt-6 pt-4 xs:pb-6 pb-4 xs:mb-4 mb-2 contact-form">
                <label class="fknomate" for="name"></label>
                <input v-model="gotya.hpf1" class="fknomate" autocomplete="off" type="text" id="name" name="name" placeholder="Your name here">
                <label class="fknomate" for="email"></label>
                <input v-model="gotya.hpf2" class="fknomate" autocomplete="off" type="email" id="email" name="email" placeholder="Your e-mail here">
              <div  class="xs:mb-4 mb-2">
                <label
                v-if="errors.name"
                class="error">
                {{errors.name}}
                </label>
                <input class="border border-sk-grey w-full py-2 px-3 bg-white text-black leading-tight text-xs xs:text-base focus:outline-none focus:shadow-outline" id="nameksljf" type="text" placeholder="What's your name?"
                v-model="form.full_name">
              </div>
              <div class="xs:mb-6 mb-4">
                <label
                v-if="errors.email"
                class="error">
                {{errors.email}}
                </label>
                <input class="border border-sk-grey w-full py-2 px-3 bg-white text-black leading-tight text-xs xs:text-base focus:outline-none focus:shadow-outline" id="emaillkjkl" type="text" placeholder="What's your email?"
                v-model="form.email">
              </div>
              <div class="xs:mb-6 mb-4">
                <label
                v-if="errors.body"
                class="error">
                {{errors.body}}
                </label>
                <textarea class="border border-sk-grey w-full py-2 px-3 h-24 xs:h-40 bg-white text-black text-xs xs:text-base leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Drop me a line :)"
                v-model="form.body"></textarea>
              </div>
              <div class="flex relative items-center justify-between">
              <div class="proj-loading w-full h-full absolute left-0 top-auto pointer-events-none z-0" style="bottom:15%;"
                :class="[{'simp-fade' : !isSending}]">
                  <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                  </div>
                </div>

                <button v-show="!isSending" class="w-full rounded text-white font-regular xl:text-2xl xs:text-lg text-base py-2 relative overflow-hidden z-10" type="button"
                :disabled="!btndis"
                :class="{'disabled' : !btndis}"
                @click.prevent="submitForm">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
        <footer class="lg:bg-sk-red-dark w-full lg:self-end lg:py-6">
        <nav class="social w-4/5 mx-auto flex lg:flex-wrap lg:content-center lg:justify-center self-end items-center items-stretch text-center py-3">  
          <a v-for="(icon, index) in icons"
            :key="icon.alt"
            :href="links[index].location"
            target="_blank"
            class="flex-1 lg:flex-none lg:mx-4"
            >
            <img class="w-12 h-auto inline-block" :src="icon.src" :alt="icon.alt" />
          </a>
        </nav>
        <p class="text-center text-xs lg:text-white lg:text-opacity-75 font-normal w-full my-2">© Utah Designs 2020</p>
        </footer>
    </div>
  </section>
</template>
<script>
import {mapGetters, mapState} from 'vuex'
export default {
  data(){
    return {
      links: [
        {
          name: 'Behance',
          location: 'https://behance.net/utahdesigns'
        },
        {
          name: 'LinkedIn',
          location: 'https://linkedin.com/in/utahdesigns/'
        },
        {
          name: 'Instagram',
          location: 'https://instagram.com/utahdesignsdev/'
        }
      ],
      form: {
        full_name: '',
        email: '',
        body: '',
      },
      gotya: {
        hpf1: '',
        hpf2: ''
      },
      isSending: false,
      messageSent: false,
      sendErr: false,
      errors: []
    }
  },

  computed:{
       btndis(){
         const checks = Object.values(this.form).every(x => x !== "") && Object.values(this.gotya).every(x => x === "")
         return checks
       },
    ...mapState(['wpData']),
    ...mapGetters(['formURL']),
        icons(){
             const iconPath = `${this.wpData.template_directory_uri}/resources/assets/images/`
             const icons = {
              Behance: iconPath + 'behance.svg',
              LinkedIn: iconPath + 'linkedin.svg',
              Instagram: iconPath + 'instagram.svg'
          }
          class navIcons {
            constructor(src, alt){
              this.src = src
              this.alt = alt
            }
          }
          
          let iconsArr = []
          for(const icon in icons) {
            iconsArr.push(new navIcons(icons[icon], icon))
          }
          return iconsArr
        },
  },

  methods:{
    submitForm(){   
      this.isSending = true
      const gotem = this.gotya.hpf1 || this.gotya.hpf2 ? true : false  
      if(!gotem){
        axios.post(this.formURL, this.form)
        .then( response => {
          console.log(response)
          this.errors = []
          this.sendErr = false
          this.messageSent = true
          this.isSending = false
        }).then( () => {
          this.form.full_name = ''
          this.form.email = ''
          this.form.body = ''
          setTimeout(() => { this.messageSent = false}, 4000)
        })
        .catch( (error) => {
          this.errors = error.response.data.message
          this.isSending = false
          this.sendErr = true
        })
      }
    }
  },
  mounted(){
    console.log(this.formURL)
  }
}
</script>
<template>
  <nav id="page-nav" ref="pagenav" class="small-nav bg-white border-solid border-t border-sk-grey-dark flex items-center items-stretch text-center py-4">  
      <a
        v-for="icon in icons" :key="icon.alt"
        :class="['flex-1', icon.alt]"
        :data-menuanchor="icon.alt"
        :href="`#${icon.alt.toLowerCase()}`"
        role="link"
      >
        <img class="h-auto inline-block" :style="{width: `${icon.width}px`}" :src="icon.src" :alt="icon.alt" />
      </a>
  </nav>
</template>

<script>
import {mapState} from 'vuex'
export default {
  computed: {
    ...mapState(['wpData']),
        icons(){
          const iconPath = `${this.wpData.template_directory_uri}/resources/assets/images/`
          const icons = [
              {name: 'about', path: iconPath + 'dude1Icon.svg', width: 28},
              {name: 'projects', path: iconPath + 'squaresIcon.svg', width: 16},
              {name: 'dms', path: iconPath + 'chatBubbleIcon.svg', width: 20}
          ]
          class navIcons {
            constructor(src, alt, width){
              this.src = src
              this.alt = alt
              this.width = width
            }
          }
          
          let iconsArr = []
          icons.forEach(function(icon){
            iconsArr.push(new navIcons(icon.path, icon.name, icon.width))
          })
          return iconsArr
        }
  }
}
</script>
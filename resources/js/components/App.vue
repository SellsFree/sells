<template>
  <div class="text-red-500 bg-gray-50 mx-auto" style="width: 768px;">
    <App-Header></App-Header>
    <mobile-side-nav></mobile-side-nav>
  </div>
</template>

<script>
import AppHeader from './shared/AppHeader.vue'
import MobileSideNav from './shared/MobileSideNav.vue'
export default {
  components: { AppHeader, MobileSideNav },
}
</script>

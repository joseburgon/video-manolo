<template>
  <main>
      <the-header />
      <router-view></router-view>
  </main>
</template>

<script>
import TheHeader from './components/TheHeader';

export default {
    name: "App",
    components: { TheHeader }
}
</script>

<style>

</style>
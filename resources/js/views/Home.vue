<template>
  <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Películas Mejor Punteadas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
              
              <movie-card v-for="movie in movies.data" :key="movie.data.movie_id" :movie="movie"  />

            </div>
        </div>
  </div>
</template>

<script>
import MovieCard from '../components/MovieCard';

export default {
    name: "Home",
    
    components: { MovieCard },

    data: () => {
      return {
        movies: '',        
      }
    },

    mounted() {
      axios.get('/api/movies')
        .then(res => {
          this.movies = res.data
        })
        .catch(error => {
          console.log('Unable to fetch movies.');
        });
    }

}
</script>

<style>

</style>
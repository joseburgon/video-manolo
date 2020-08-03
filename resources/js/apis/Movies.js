import Api from "./Api";

export default {
    getMovies() {
        return Api().get("/movies");
    },
};

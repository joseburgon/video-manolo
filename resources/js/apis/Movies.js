import Api from "./Api";

export default {
    getAll() {
        return Api().get("/movies");
    },

    getOne(id) {
        return Api().get(`/movies/${id}`);
    }
};

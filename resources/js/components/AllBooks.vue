<template>
    <div>
        <h3 class="text-center">All Books</h3> <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{book.id}}</td>
                    <td>{{book.title}}</td>
                    <td>{{book.author}}</td>
                    <td>{{book.publisher}}</td>
                    <td>{{book.year}}</td>
                    <td>
                        <router-link :to="{name: 'edit', params: { id: book.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    data() {
        return {
            books: []
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/books`)
            .then(response => {
                this.books = response.data;
            });
    },
    methods: {
        deleteBook(id) {
                this.axios
                    .delete(`http://localhost:8000/api/book/delete/${id}`)
                    .then(response => {
                        let i = this.books.map(item => item.id).indexOf(id); // find index of your object
                        this.books.splice(i, 1)
                    });
            }
    }
}
</script>


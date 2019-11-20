<template>
  <div class="container">
  <h1>Add A Book</h1>
  <form action="#" method="POST" @submit.prevent="addbook">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" v-model="title">
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" name="author" v-model="author">
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="text" class="form-control" id="image" name="image" v-model="image">
    </div>
    <div class="form-group">
      <label for="description">description</label>
      <input type="text" class="form-control" id="description" name="description" v-model="description">
    </div>
    <div class="form-group">
      <label ><input type="checkbox"  id="featured" name="featured" v-model="featured">Featured</label>
    </div>
    <div class="form-group">
      <label for="link">link</label>
      <input type="text" class="form-control" id="link" name="link" v-model="link">
    </div>
    <div class="form-group">


    <ApolloQuery :query="require('./graphql/queries/Categories.gql')">
          <template slot-scope="{ result: { data, loading },isLoading }">
           <!-- Some content -->
           <div v-if="isLoading">Loading.....</div>
           <select v-else v-model="category">
            <option v-for="category of data.categories" :key="category.id" :value="category.id">
              {{ category.name}}
             </option>
           </select>
          </template>
      </ApolloQuery>

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import addBook from './graphql/mutations/AddBook.gql'
export default {

  data(){
    return{
      title: '',
      author: '',
      image: '',
      link: '',
      description: '',
      featured: true,
      category: 1
    }
  },
  methods:{
  addbook(){
      this.$apollo.mutate({
          // Query
          mutation: addBook,
          // Parameters
          variables: {
              title: this.title,
              author: this.author,
              image: this.image,
              link: this.link,
              description: this.description,
              featured: this.featured,
              category_id: this.category,
          },
        }).then((data) => {
          // Result
          console.log(data),
          this.$router.push('/')
        }).catch((error) => {
          // Error
          console.error(error)
          // We restore the initial user input
          this.newTag = newTag
        })
  }
  }
}
</script>

<style lang="css" scoped>
</style>

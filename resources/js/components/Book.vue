<template>
  <div class="container">
  This is a book page {{$route.params.id}}

  <ApolloQuery :query="require('./graphql/queries/Book.gql')" :variables="{ id: $route.params.id }">
        <template slot-scope="{ result: { data, loading },isLoading }">
           <!-- Some content -->
           <div v-if="isLoading">Loading....</div>
           <div v-else>
             <div class="">
             <img :src="data.book.image" alt="" class="img">
               {{data.book.title}}---
               {{data.book.description}}
             </div>
             <router-link :to="`/books/${data.book.id}/edit`" href="#" class="link-margin">Edit</router-link>
             <a href="#" @click.prevent="deleteBook" class="link-margin">Delete</a>
           </div>
        </template>
  </ApolloQuery>

  </div>

</template>

<script>
import deleteBook from './graphql/mutations/DeleteBook.gql'

export default{
  methods:{
    deleteBook(){
    this.$apollo.mutate({
      mutation:deleteBook,
      variables:{
        id: this.$route.params.id,
      }
    }).then(data=>{
      console.log(data)
      this.$router.push('/')
    })
    }
  }
}


</script>

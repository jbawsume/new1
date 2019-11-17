<template>
  <div>
  This is a book page {{$route.params.id}}

  <ApolloQuery :query="require('./graphql/queries/Book.gql')" :variables="{ id: $route.params.id }">
        <template slot-scope="{ result: { data, loading },isLoading }">
           <!-- Some content -->
           <div v-if="isLoading">Loading....</div>
           <div v-else>
             <div class="">
               {{data.book.title}}
               {{data.book.description}}
             </div>
           </div>
        </template>
  </ApolloQuery>

  </div>

</template>

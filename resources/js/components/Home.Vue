<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                    <ApolloQuery :query="categoriesQuery">
                          <template slot-scope="{ result: { data, loading },isLoading }">
                           <!-- Some content -->
                           <div v-if="isLoading">Loading.....</div>
                           <div v-else>
                           <a href="#" @click="selectCategory('all')" class="link-margin">All</a>
                           <a href="#" @click="selectCategory('featured')" class="link-margin">Featured</a>
                            <a href="#" v-for="category of data.categories" :key="category.id" @click="selectCategory(category.id)" class="link-margin">
                              {{ category.id }}.{{ category.name}}
                             </a>
                           </div>
                          </template>
                          </ApolloQuery>
                    </div>
                </div>
            </div>
        </div>
        <div>

        <div v-if="selectedCategory =='all'">
              <ApolloQuery :query="query">
                    <template slot-scope="{ result: { data, loading },isLoading }">
                       <!-- Some content -->
                       <div v-if="isLoading">Loading....</div>
                       <div v-else>
                         <div href="#" v-for="book of data.books" :key="book.id" >
                          {{ book.id }}.{{ book.title}}
                         </div>
                       </div>
                    </template>
              </ApolloQuery>
        </div>
        <div v-else-if="selectedCategory =='featured'">
              <ApolloQuery :query="query" :variables="{ featured: true }">
                    <template slot-scope="{ result: { data, loading },isLoading }">
                       <!-- Some content -->
                       <div v-if="isLoading">Loading....</div>
                       <div v-else>
                         <div href="#" v-for="book of data.booksByFeatured" :key="book.id" >
                          {{ book.id }}.{{ book.title}}
                         </div>
                       </div>
                    </template>
              </ApolloQuery>
        </div>
        <div v-else>
              <ApolloQuery :query="query" :variables="{ id: selectedCategory }">
                    <template slot-scope="{ result: { data, loading },isLoading }">
                       <!-- Some content -->
                       <div v-if="isLoading">Loading....</div>
                       <div v-else>
                         <div href="#" v-for="book of data.category.books" :key="book.id" >
                          {{ book.id }}.{{ book.title}}
                         </div>
                       </div>
                    </template>
                </ApolloQuery>
          </div>
        </div>
    </div>
</template>

<script>
import categoryQuery from './graphql/queries/Category.gql'
import booksQuery from './graphql/queries/Books.gql'
import categoriesQuery from './graphql/queries/Categories.gql'
import booksFeaturedQuery from './graphql/queries/BooksFeatured.gql'

    export default {
        name: 'home',
        components:{

        },
        data(){
          return{
            categoryQuery,
            booksQuery,
            categoriesQuery,
            booksFeaturedQuery,
            selectedCategory:'all',
            query:booksQuery,
            categories:[]
          }
        },
        methods:{
        selectCategory(category){
          if(category=='all'){
            this.query= booksQuery
          }else if (category=='featured'){
            this.query=booksFeaturedQuery
          }else {
            this.query = categoryQuery
          }

          this.selectedCategory = category
        }
        }
    }
</script>
<style>
.link-margin{
    margin-right:15px
}

</style>
